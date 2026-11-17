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
 * @SerDe\AvroName("ArraysWithComplexType")
 */
#[AvroType('record')]
#[AvroName('ArraysWithComplexType')]
class ArraysWithComplexType
{
    /**
     * @SerDe\AvroType("array", attributes={
     *
     *     @SerDe\AvroItems({
     *         "string",
     *
     *         @SerDe\AvroType("array", attributes={@SerDe\AvroItems(@SerDe\AvroType("string"))})
     *     })
     * })
     */
    #[AvroType(
        'array',
        attributes: new AvroItems(
            new AvroType(Type::STRING),
            new AvroType(Type::ARRAY, new AvroItems(new AvroType(Type::STRING))),
        )
    )]
    private array $arrayWithUnion;

    /**
     * @SerDe\AvroType("array", attributes={
     *
     *     @SerDe\AvroItems(
     *
     *         @SerDe\AvroType("map", attributes={@SerDe\AvroValues(@SerDe\AvroType("string"))})
     *     )
     * })
     */
    #[AvroType(
        Type::ARRAY,
        attributes: new AvroItems(
            new AvroType(
                Type::MAP,
                new AvroValues(new AvroType(Type::STRING))
            ),
        )
    )]
    private array $arrayWithMap;
}
