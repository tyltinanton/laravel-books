<?php

namespace App\Sources\SharedValueObjects;

interface DecimalValueObjectInterface
{
    public function equal(DecimalValueObjectInterface $object);
    public function value();
    public function setValue($value = 0.0);
    public function increase($value = 0.0);
}
