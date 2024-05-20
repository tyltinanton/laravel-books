<?php

namespace App\Sources\SharedValueObjects;
class DateValueObject implements DateValueObjectInterface
{
    protected $value = null;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public function equal(DateValueObjectInterface $object): bool
    {
        return $this->value->format("Y-m-dH:i:s") == $object->value();
    }
    public function value(){
        return $this->value ?? new \DateTime();
    }
    public function setValue(\DateTime $value): DateValueObject
    {
        return new self($value);
    }
}
