<?php

namespace App\Sources\SharedValueObjects;
class IntValueObject implements IntValueObjectInterface
{
    protected $value = 0;

    public function __construct($value = 0)
    {
        if (!is_int($value))
            $value = (int)$value;
        $this->value = $value;
    }

    public function equal(IntValueObjectInterface $object): bool
    {
        return $this->value == $object->value();
    }
    public function value(): int
    {
        return (int)$this->value;
    }
    public function setValue($value = 0)
    {
        return new self($value);
    }

    public function increase($value = 0)
    {
        return new self($this->value() + (int)$value);
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }
}
