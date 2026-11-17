<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;

/**
 * @Annotation
 */
class AvroNamespace implements SchemaAttribute
{
    public string $value;

    public function name(): string
    {
        return AttributeName::NAMESPACE;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes();
    }
}
