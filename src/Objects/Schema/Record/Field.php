<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Record;

use PrimaAssicurazioni\AvroSerializer\Objects\Definition;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class Field implements Definition
{
    private string $name;

    private Schema $type;

    /**
     * @var array<FieldOption>
     */
    private array $options;

    public function __construct(
        string $name,
        Schema $type,
        FieldOption ...$options,
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->options = $options;
    }

    /**
     * @return array<mixed>
     */
    public function serialize(): array
    {
        $field = [
            'name' => $this->name,
            'type' => $this->type->serialize(),
        ];

        foreach ($this->options as $option) {
            $field[$option->getName()] = $option->getValue();
        }

        return $field;
    }
}
