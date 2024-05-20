<?php

namespace App\Sources\SharedValueObjects;

class Uuid extends StringValueObject
{
    public function __construct($value = null)
    {
        parent::__construct($value);
    }

    static public function random(): Uuid
    {
        return new self((string)\Ramsey\Uuid\Uuid::uuid4());
    }
}
