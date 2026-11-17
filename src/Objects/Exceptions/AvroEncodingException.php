<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects\Exceptions;

use PrimaAssicurazioni\AvroSerializer\Objects\AvroSerializerException;

class AvroEncodingException extends \RuntimeException implements AvroSerializerException
{
}
