<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class LongType extends PrimitiveType
{
    public function __construct()
    {
        parent::__construct(TypeName::LONG);
    }
}
