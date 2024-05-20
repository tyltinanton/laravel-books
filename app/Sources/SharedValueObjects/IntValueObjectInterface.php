<?php

namespace App\Sources\SharedValueObjects;

interface IntValueObjectInterface
{
    public function equal(IntValueObjectInterface $object);
    public function value();
    public function setValue($value = 0);
    public function increase($value = 0);
}
