<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\VariadicAttribute;

#[\Attribute]
final class AvroSymbols implements VariadicAttribute
{
    /**
     * @var non-empty-array<int, string>
     */
    private array $symbols;

    /**
     * @param non-empty-array<int, string> $symbols
     */
    public function __construct(array $symbols)
    {
        $this->symbols = $symbols;
    }

    public function name(): string
    {
        return AttributeName::SYMBOLS;
    }

    /**
     * @return array<string>
     */
    public function value(): array
    {
        return $this->symbols;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes();
    }
}
