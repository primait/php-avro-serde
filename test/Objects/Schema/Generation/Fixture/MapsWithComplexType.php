<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Objects\Schema\Generation\Fixture;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations as SerDe;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroItems;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroValues;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\Type;

/**
 * @SerDe\AvroType("record")
 *
 * @SerDe\AvroName("MapsWithComplexType")
 */
#[AvroType(Type::RECORD)]
#[AvroName('MapsWithComplexType')]
class MapsWithComplexType
{
    /**
     * @SerDe\AvroType("map", attributes={
     *
     *     @SerDe\AvroValues({
     *         "string",
     *
     *         @SerDe\AvroType("array", attributes={@SerDe\AvroItems("string")})
     *     })
     * })
     */
    #[AvroType(
        Type::MAP,
        new AvroValues(
            Type::STRING,
            new AvroType(
                Type::ARRAY,
                new AvroItems(Type::STRING)
            )
        )
    )]
    private $mapWithUnion;

    /**
     * @SerDe\AvroType("map", attributes={
     *
     *     @SerDe\AvroValues(
     *
     *         @SerDe\AvroType("array", attributes={@SerDe\AvroItems("string")})
     *     )
     * })
     */
    #[AvroType(
        Type::MAP,
        new AvroValues(
            new AvroType(
                Type::ARRAY,
                new AvroItems(Type::STRING)
            )
        )
    )]
    private $mapWithArray;
}
