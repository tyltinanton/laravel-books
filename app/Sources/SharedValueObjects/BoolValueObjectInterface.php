<?php

namespace App\Sources\SharedValueObjects;

interface BoolValueObjectInterface
{
    public function equal(BoolValueObjectInterface $object);
    public function value();
    public function setValue($value = false);
}
