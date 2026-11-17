<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class BooleanType extends PrimitiveType
{
    public function __construct()
    {
        parent::__construct(TypeName::BOOLEAN);
    }
}
