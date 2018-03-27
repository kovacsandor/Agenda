<?php

class ValueType extends Value
{
    private $type;

    public function __construct($type, $value)
    {
        parent::__construct($value);
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}
