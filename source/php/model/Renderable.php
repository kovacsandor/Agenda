<?php

class Renderable extends ValueLabel
{
    private $isVisible;

    public function __construct($label, $isVisible, $value)
    {
        parent::__construct($label, $value);
        $this->isVisible = $isVisible;
    }

    public function isVisible()
    {
        return $this->isVisible;
    }
}