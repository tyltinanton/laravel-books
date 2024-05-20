<?php

namespace App\Sources\SharedValueObjects;

class CreatedAt extends DateValueObject
{
    static function fromPrimitive($dateTime = '') {
        return new self(new \DateTime($dateTime));
    }
}

