<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Test\Objects\Schema\Generation\Fixture;

use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Annotations as SerDe;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroAliases;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroDefault;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroDoc;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroName;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroNamespace;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroOrder;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\AvroType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\Generation\Attributes\Order;

/**
 * @SerDe\AvroName("PrimitiveTypes")
 *
 * @SerDe\AvroNamespace("org.acme")
 *
 * @SerDe\AvroType("record")
 */
#[AvroName('PrimitiveTypes')]
#[AvroNamespace('org.acme')]
#[AvroType('record')]
class PrimitiveTypes
{
    /**
     * @SerDe\AvroDoc("null type")
     *
     * @SerDe\AvroType("null")
     */
    #[AvroDoc('null type')]
    #[AvroType('null')]
    private $nullType;

    /**
     * @SerDe\AvroName("isItTrue")
     *
     * @SerDe\AvroDefault(false)
     *
     * @SerDe\AvroType("boolean")
     */
    #[AvroName('isItTrue')]
    #[AvroDefault(false)]
    #[AvroType('boolean')]
    private $booleanType;

    /**
     * @SerDe\AvroType("int")
     */
    #[AvroType('int')]
    private $intType;

    /**
     * @SerDe\AvroType("long")
     *
     * @SerDe\AvroOrder("ascending")
     */
    #[AvroType('long')]
    #[AvroOrder(Order::ASC)]
    private $longType;

    /**
     * @SerDe\AvroType("float")
     *
     * @SerDe\AvroAliases({"foo", "bar"})
     */
    #[AvroType('float')]
    #[AvroAliases('foo', 'bar')]
    private $floatType;

    /**
     * @SerDe\AvroType("double")
     */
    #[AvroType('double')]
    private $doubleType;

    /**
     * @SerDe\AvroType("bytes")
     */
    #[AvroType('bytes')]
    private $bytesType;

    /**
     * @SerDe\AvroType("string")
     */
    #[AvroType('string')]
    private $stringType;
}
