<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Integrations\Symfony\Serializer\Fixture;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations as SerDe;

/**
 * @SerDe\AvroType("record")
 *
 * @SerDe\AvroName("SampleUserRecord")
 */
class SampleUserRecord
{
    /**
     * @SerDe\AvroName("Name")
     *
     * @SerDe\AvroType("string")
     */
    private $name;
}
