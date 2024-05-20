<?php

namespace App\Sources\SharedValueObjects;
class BoolValueObject implements BoolValueObjectInterface
{
    protected $value = '';

    public function __construct($value = false)
    {
        $this->value = $value;
    }

    public function equal(BoolValueObjectInterface $object): bool
    {
        return $this->value == $object->value();
    }
    public function value(){
        return $this->value;
    }
    public function setValue($value = false): BoolValueObjectInterface
    {
        return new self($value);
    }
}
