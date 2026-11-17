<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Objects\Schema\Generation\Fixture;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations as SerDe;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroNamespace;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroType;

/**
 * @SerDe\AvroName("EmptyRecord")
 *
 * @SerDe\AvroNamespace("org.acme")
 *
 * @SerDe\AvroType("record")
 */
#[AvroName('EmptyRecord')]
#[AvroNamespace('org.acme')]
#[AvroType('record')]
class EmptyRecord
{
}
