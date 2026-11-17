<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema;

class BytesType extends PrimitiveType
{
    public function __construct()
    {
        parent::__construct(TypeName::BYTES);
    }
}
