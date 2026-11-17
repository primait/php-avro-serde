<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Objects\Schema;

use PHPUnit\Framework\TestCase;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class UnionTypeTest extends TestCase
{
    public function testShouldSerializeUnionTypes(): void
    {
        $serializedUnion = Schema::union(
            Schema::null(),
            Schema::string(),
            Schema::long()
        )->serialize();

        $expectedUnion = ['null', 'string', 'long'];

        $this->assertEquals($expectedUnion, $serializedUnion);
    }
}
