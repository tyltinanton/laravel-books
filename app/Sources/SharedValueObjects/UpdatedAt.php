<?php

namespace App\Sources\SharedValueObjects;

class UpdatedAt extends DateValueObject
{
    static function fromPrimitive($dateTime = '') {
        return new self(new \DateTime($dateTime));
    }
}
