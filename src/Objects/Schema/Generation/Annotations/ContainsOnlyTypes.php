<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;

trait ContainsOnlyTypes
{
    /**
     * @phpstan-var string|AvroType|array<string|AvroType>
     */
    public string|array|AvroType $value;

    /**
     * @return array<SchemaAttribute>
     */
    public function value(): array
    {
        if (!\is_array($this->value)) {
            return [$this->valueToType($this->value)];
        }

        return \array_map([$this, 'valueToType'], $this->value);
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes(...$this->value());
    }

    /**
     * @param string|AvroType $value
     */
    private function valueToType($value): AvroType
    {
        if ($value instanceof AvroType) {
            return $value;
        }

        return AvroType::create($value);
    }
}
