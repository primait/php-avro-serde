<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\TypeOnlyAttribute;

#[\Attribute]
final class AvroValues implements TypeOnlyAttribute
{
    /**
     * @var AvroType[]
     */
    public array $types;

    public function __construct(Type|AvroType ...$types)
    {
        $this->types = array_map(function ($type) {
            if ($type instanceof AvroType) {
                return $type;
            }

            return new AvroType($type);
        }, $types);
    }

    /**
     * @return AvroType[]
     */
    public function value(): array
    {
        return $this->types;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes(...$this->value());
    }

    public function name(): string
    {
        return AttributeName::VALUES;
    }
}
