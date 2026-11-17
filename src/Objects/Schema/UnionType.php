<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class UnionType extends Schema
{
    /**
     * @var array<Schema>
     */
    private array $types;

    public function __construct(Schema $type, Schema ...$types)
    {
        \array_unshift($types, $type);
        $this->types = $types;
    }

    /**
     * @return array<mixed>
     */
    public function serialize(): array
    {
        return \array_map(function (Schema $schema) {
            return $schema->serialize();
        }, $this->types);
    }
}
