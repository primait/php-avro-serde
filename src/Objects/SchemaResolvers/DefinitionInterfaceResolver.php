<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\SchemaResolvers;

use Apache\Avro\Schema\AvroSchema;
use Apache\Avro\Schema\AvroSchemaParseException;
use Assert\Assert;
use PrimaAssicurazioni\AvroSerializer\Objects\HasSchemaDefinitionInterface;
use PrimaAssicurazioni\AvroSerializer\Objects\SchemaResolverInterface;

class DefinitionInterfaceResolver implements SchemaResolverInterface
{
    /**
     * @throws AvroSchemaParseException
     */
    public function valueSchemaFor(mixed $record): AvroSchema
    {
        /** @var HasSchemaDefinitionInterface $record */
        $this->guardRecordHasDefinition($record);

        return AvroSchema::parse($record::valueSchemaJson());
    }

    /**
     * @throws AvroSchemaParseException
     */
    public function keySchemaFor(mixed $record): ?AvroSchema
    {
        $this->guardRecordHasDefinition($record);

        $keySchemaJson = $record::keySchemaJson();

        if (!$keySchemaJson) {
            return null;
        }

        return AvroSchema::parse($keySchemaJson);
    }

    private function guardRecordHasDefinition(mixed $record): void
    {
        Assert::that($record)
            ->isObject()
            ->implementsInterface(HasSchemaDefinitionInterface::class);
    }
}
