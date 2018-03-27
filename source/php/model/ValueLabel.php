<?php

class ValueLabel extends Value
{
    private $label;

    public function __construct($label, $value)
    {
        parent::__construct($value);
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }
}
