<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Integrations\Symfony\Serializer;

use Doctrine\Common\Annotations\AnnotationReader as DoctrineAnnotationReader;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use PrimaAssicurazioni\AvroSerializer\Integrations\Symfony\Serializer\AvroSerDeEncoder;
use PrimaAssicurazioni\AvroSerializer\Integrations\Symfony\Serializer\NameConverter\AvroNameConverter;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\AnnotationReader;
use PrimaAssicurazioni\AvroSerializer\Test\Integrations\Symfony\Serializer\Fixture\SampleUserRecord;

class AvroNameConverterTest extends TestCase
{
    private AvroNameConverter $nameConverter;

    protected function setUp(): void
    {
        $this->nameConverter = new AvroNameConverter(
            new AnnotationReader(new DoctrineAnnotationReader())
        );
    }

    #[Test]
    public function it_should_return_the_normalized_property_name(): void
    {
        $normalizedName = $this->nameConverter
            ->normalize('name', SampleUserRecord::class, AvroSerDeEncoder::FORMAT_AVRO);
        $this->assertEquals('Name', $normalizedName);
    }

    #[Test]
    public function it_should_return_the_denormalized_property_name(): void
    {
        $normalizedName = $this->nameConverter
            ->denormalize('Name', SampleUserRecord::class, AvroSerDeEncoder::FORMAT_AVRO);
        $this->assertEquals('name', $normalizedName);
    }
}
