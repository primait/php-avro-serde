<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;

/**
 * @Annotation
 */
final class AvroType implements SchemaAttribute
{
    public string $value;

    /**
     * @var array<\PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute>
     */
    public array $attributes = [];

    public static function create(string $typeName, SchemaAttribute ...$attributes): self
    {
        $avroType = new self();

        $avroType->value = $typeName;
        $avroType->attributes = $attributes;

        return $avroType;
    }

    public function name(): string
    {
        return AttributeName::TYPE;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes(...$this->attributes);
    }
}
