<?php

namespace App\Sources\SharedValueObjects;

interface StringValueObjectInterface
{
    public function equal(StringValueObjectInterface $object);
    public function value();
    public function setValue($value = '');
}
