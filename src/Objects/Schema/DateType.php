<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class DateType extends LogicalType
{
    public function __construct()
    {
        parent::__construct(
            TypeName::DATE,
            TypeName::INT
        );
    }
}
