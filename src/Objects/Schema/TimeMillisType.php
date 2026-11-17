<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class TimeMillisType extends LogicalType
{
    public function __construct()
    {
        parent::__construct(TypeName::TIME_MILLIS, TypeName::INT);
    }
}
