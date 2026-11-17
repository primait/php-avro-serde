<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttribute;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaAttributes;

#[\Attribute]
final class AvroOrder implements SchemaAttribute
{
    public function __construct(
        private Order $order,
    ) {
    }

    public function name(): string
    {
        return AttributeName::ORDER;
    }

    public function value(): string
    {
        return $this->order->value;
    }

    public function attributes(): SchemaAttributes
    {
        return new SchemaAttributes();
    }
}
