<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Objects;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use PrimaAssicurazioni\AvroSerializer\Objects\DefaultRecordSerializerFactory;

class DefaultRecordSerializerFactoryTest extends TestCase
{
    #[Test]
    public function it_should_produce_a_default_RecordSerializer(): void
    {
        $one = DefaultRecordSerializerFactory::get('http://localhost');
        $two = DefaultRecordSerializerFactory::get('http://localhost');

        $this->assertNotSame($one, $two);
    }
}
