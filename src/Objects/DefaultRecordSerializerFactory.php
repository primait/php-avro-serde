<?php

declare(strict_types=1);

namespace FlixTech\AvroSerializer\Objects;

use Assert\Assert;
use GuzzleHttp\Client;
use PrimaAssicurazioni\SchemaRegistryApi\Registry\Cache\AvroObjectCacheAdapter;
use PrimaAssicurazioni\SchemaRegistryApi\Registry\CacheAdapter;
use PrimaAssicurazioni\SchemaRegistryApi\Registry\CachedRegistry;
use PrimaAssicurazioni\SchemaRegistryApi\Registry\PromisingRegistry;

final class DefaultRecordSerializerFactory
{
    /**
     * @param array<string,mixed> $guzzleClientOptions
     */
    public static function get(
        string $schemaRegistryURL,
        array $guzzleClientOptions = [],
        ?CacheAdapter $adapter = null,
    ): RecordSerializer {
        Assert::that($schemaRegistryURL)->url();

        $guzzleClientOptions = \array_merge(
            $guzzleClientOptions,
            ['base_uri' => $schemaRegistryURL]
        );

        return new RecordSerializer(
            new CachedRegistry(
                new PromisingRegistry(
                    new Client($guzzleClientOptions)
                ),
                $adapter ?? new AvroObjectCacheAdapter()
            ),
            [
                RecordSerializer::OPTION_REGISTER_MISSING_SUBJECTS => true,
                RecordSerializer::OPTION_REGISTER_MISSING_SCHEMAS => true,
            ]
        );
    }
}
