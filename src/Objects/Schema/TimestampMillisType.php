<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class TimestampMillisType extends LogicalType
{
    public function __construct()
    {
        parent::__construct(TypeName::TIMESTAMP_MILLIS, TypeName::LONG);
    }
}
