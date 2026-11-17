<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Record;

class FieldAliases extends FieldOption
{
    public function __construct(string $alias, string ...$aliases)
    {
        \array_unshift($aliases, $alias);
        parent::__construct('aliases', $aliases);
    }
}
