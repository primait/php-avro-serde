<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class LocalTimestampMillisType extends LogicalType
{
    public function __construct()
    {
        parent::__construct(TypeName::LOCAL_TIMESTAMP_MILLIS, TypeName::LONG);
    }
}
