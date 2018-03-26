<?php

class LabelValue
{
    private $label;
    private $value;

    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getValue()
    {
        return $this->value;
    }
}
