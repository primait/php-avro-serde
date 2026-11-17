# no builtin rules and variables
MAKEFLAGS =+ -rR --warn-undefined-variables

.PHONY: composer-install composer-update composer-update-lowest phpstan cs-fixer examples docker run

CONFLUENT_VERSION ?= latest
CONFLUENT_NETWORK_SUBNET ?= 172.68.0.0/24
CONFLUENT_NETWORK_GATEWAY ?= 172.68.0.1
SCHEMA_REGISTRY_IPV4 ?= 172.68.0.103
KAFKA_BROKER_IPV4 ?= 172.68.0.102
COMPOSER ?= bin/composer.phar
COMPOSER_VERSION ?= 2.11.2
PHP_STAN ?= vendor/bin/phpstan
PHP_CS_FIXER ?= vendor/bin/php-cs-fixer
PHPUNIT ?= vendor/bin/phpunit
PHP ?= bin/php
PHP_VERSION ?= 8.3
XDEBUG_VERSION ?= 3.5.3
XDEBUG_OPTIONS ?= -d xdebug.mode=off
export

docker:
	DOCKER_BUILDKIT=1 docker build \
	  --build-arg PHP_VERSION=$(PHP_VERSION) \
	  --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) \
	  -t php-avro-serde:$(PHP_VERSION) \
	  -f Dockerfile \
	  .

composer-install:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(COMPOSER) install --no-interaction --no-progress --no-scripts

composer-update:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(COMPOSER) update --prefer-stable --no-interaction --no-progress --no-scripts

composer-update-lowest:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(COMPOSER) update --prefer-lowest --no-interaction --no-progress --no-scripts

phpstan:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(PHP_STAN) analyse --memory-limit 4G

cs-fixer:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(PHP_CS_FIXER) fix --config=.php-cs-fixer.dist.php --diff -v --dry-run \
	  --path-mode=intersection --allow-risky=yes src test

cs-fixer-modify:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(PHP_CS_FIXER) fix --config=.php-cs-fixer.dist.php --diff -v \
	  --path-mode=intersection --allow-risky=yes src test

phpunit:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(PHPUNIT) --exclude-group integration

phpunit-integration:
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) $(PHPUNIT) --group integration

coverage:
	mkdir -p build
	PHP_VERSION=$(PHP_VERSION) $(PHP) -d xdebug.mode=coverage vendor/bin/phpunit --exclude-group integration \
	  --coverage-clover=build/coverage.clover --coverage-text

ci-local: cs-fixer phpstan phpunit

examples:
	PHP_VERSION=$(PHP_VERSION) $(PHP) examples/*

install-phars:
	curl https://getcomposer.org/download/$(COMPOSER_VERSION)/composer.phar -o bin/composer.phar -LR -z bin/composer.phar
	chmod a+x bin/composer.phar

platform:
	docker compose down
	docker compose pull
	docker compose up --remove-orphans -d
	bin/wait-for-all.sh

platform-logs:
	docker compose logs -f

clean:
	rm -rf build
	docker compose down

benchmark: platform
	PHP_VERSION=$(PHP_VERSION) $(PHP) $(XDEBUG_OPTIONS) ./vendor/bin/phpbench run benchmarks/AvroEncodingBench.php --report=aggregate --retry-threshold=5
	docker compose down
