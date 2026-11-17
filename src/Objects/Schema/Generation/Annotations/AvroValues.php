<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\AttributeName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\TypeOnlyAttribute;

/**
 * @Annotation
 */
final class AvroValues implements TypeOnlyAttribute
{
    use ContainsOnlyTypes;

    public function name(): string
    {
        return AttributeName::VALUES;
    }
}
