<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects;

use Apache\Avro\Schema\AvroSchema;
use Apache\Avro\Schema\AvroSchemaParseException;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\ArrayType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\BooleanType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\BytesType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\DateType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\DoubleType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\DurationType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\EnumType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\FixedType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\FloatType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\IntType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\LocalTimestampMicros;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\LocalTimestampMillisType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\LongType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\MapType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\NamedType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\NullType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\RecordType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\StringType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\TimeMicrosType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\TimeMillisType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\TimestampMicrosType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\TimestampMillisType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\UnionType;
use PrimaAssicurazioni\AvroSerializer\Objects\Schema\UuidType;

abstract class Schema implements Definition
{
    public static function null(): NullType
    {
        return new NullType();
    }

    public static function boolean(): BooleanType
    {
        return new BooleanType();
    }

    public static function int(): IntType
    {
        return new IntType();
    }

    public static function long(): LongType
    {
        return new LongType();
    }

    public static function float(): FloatType
    {
        return new FloatType();
    }

    public static function double(): DoubleType
    {
        return new DoubleType();
    }

    public static function bytes(): BytesType
    {
        return new BytesType();
    }

    public static function string(): StringType
    {
        return new StringType();
    }

    public static function named(string $name): NamedType
    {
        return new NamedType($name);
    }

    public static function record(): RecordType
    {
        return new RecordType();
    }

    public static function enum(): EnumType
    {
        return new EnumType();
    }

    public static function array(): ArrayType
    {
        return new ArrayType();
    }

    public static function map(): MapType
    {
        return new MapType();
    }

    public static function union(Schema $type, Schema ...$types): UnionType
    {
        return new UnionType($type, ...$types);
    }

    public static function fixed(): FixedType
    {
        return new FixedType();
    }

    public static function uuid(): UuidType
    {
        return new UuidType();
    }

    public static function date(): DateType
    {
        return new DateType();
    }

    public static function timeMillis(): TimeMillisType
    {
        return new TimeMillisType();
    }

    public static function timeMicros(): TimeMicrosType
    {
        return new TimeMicrosType();
    }

    public static function timestampMillis(): TimestampMillisType
    {
        return new TimestampMillisType();
    }

    public static function timestampMicros(): TimestampMicrosType
    {
        return new TimestampMicrosType();
    }

    public static function localTimestampMillis(): LocalTimestampMillisType
    {
        return new LocalTimestampMillisType();
    }

    public static function localTimestampMicros(): LocalTimestampMicros
    {
        return new LocalTimestampMicros();
    }

    public static function duration(): DurationType
    {
        return new DurationType();
    }

    /**
     * @throws AvroSchemaParseException
     */
    final public function parse(): AvroSchema
    {
        return AvroSchema::realParse($this->serialize());
    }
}
