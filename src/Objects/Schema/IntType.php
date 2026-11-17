<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class IntType extends PrimitiveType
{
    public function __construct()
    {
        parent::__construct(TypeName::INT);
    }
}
