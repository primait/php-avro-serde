<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class NamedType extends Schema
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function serialize(): string
    {
        return $this->name;
    }
}
