<?php

namespace App\Sources\SharedValueObjects;
class DecimalValueObject implements DecimalValueObjectInterface
{
    protected $value = 0.0;

    public function __construct($value = 0.0)
    {
        $this->value = $value;
    }

    public function equal(DecimalValueObjectInterface $object): bool
    {
        return $this->value == $object->value();
    }
    public function value(): float
    {
        return (float)$this->value;
    }
    public function setValue($value = 0.0)
    {
        return new self($value);
    }

    public function increase($value = 0)
    {
        return new self($this->value() + (float)$value);
    }
}
