<?php

declare(strict_types=1);

namespace PrimaAssicurazioni\AvroSerializer\Objects;

interface Definition
{
    public function serialize(): mixed;
}
