<?php

abstract class Value
{
    private $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
