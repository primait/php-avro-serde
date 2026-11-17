<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;

/**
 * @Annotation
 */
final class AvroSize implements SchemaAttribute
{
    public int $value;

    public function name(): string
    {
        return AttributeName::SIZE;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes();
    }
}
