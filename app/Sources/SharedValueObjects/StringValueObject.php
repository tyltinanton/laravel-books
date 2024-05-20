<?php

namespace App\Sources\SharedValueObjects;
class StringValueObject implements StringValueObjectInterface
{
    protected $value = '';

    public function __construct($value = '')
    {
        $this->value = $value;
    }

    public function equal(StringValueObjectInterface $object){
        return $this->value == $object->value();
    }
    public function value(){
        return $this->value;
    }
    public function setValue($value = ''){
        return new self($value);
    }
}
