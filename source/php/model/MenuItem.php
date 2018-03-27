<?php

class MenuItem extends Renderable
{
    private $isActive;

    public function __construct($label, $isActive, $isVisible, $value)
    {
        parent::__construct($label, $isVisible, $value);
        $this->isActive = $isActive;
    }

    public function isActive()
    {
        return $this->isActive;
    }
}
