<?php

namespace App\Sources\SharedValueObjects;

interface DateValueObjectInterface
{
    public function equal(DateValueObjectInterface $object);
    public function value();
    public function setValue(\DateTime $value);
}
