<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects;

use Doctrine\Common\Annotations\AnnotationReader;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\SchemaGenerator;

class DefaultSchemaGeneratorFactory
{
    public static function get(): SchemaGenerator
    {
        return new SchemaGenerator(
            new Schema\Generation\AnnotationReader(
                new AnnotationReader()
            )
        );
    }
}
