<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes;

enum Order: string
{
    case ASC = 'ascending';
    case DESC = 'descending';
    case NONE = 'ignore';
}
