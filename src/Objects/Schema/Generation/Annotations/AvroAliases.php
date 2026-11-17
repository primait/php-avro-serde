<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\VariadicAttribute;

/**
 * @Annotation
 */
final class AvroAliases implements VariadicAttribute
{
    /**
     * @var array<string>
     */
    public array $value;

    public function name(): string
    {
        return AttributeName::ALIASES;
    }

    /**
     * @return array<string>
     */
    public function value(): array
    {
        return $this->value;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes();
    }
}
