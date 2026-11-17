<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class UuidType extends LogicalType
{
    public function __construct()
    {
        parent::__construct(
            TypeName::UUID,
            TypeName::STRING
        );
    }
}
