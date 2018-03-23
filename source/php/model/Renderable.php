<?php

abstract class Renderable
{
    protected $isVisible;

    protected function __construct($isVisible)
    {
        $this->isVisible = $isVisible;
    }

    public function isVisible()
    {
        return $this->isVisible;
    }
}