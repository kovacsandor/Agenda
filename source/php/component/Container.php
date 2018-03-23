<?php

abstract class Container extends Component
{
    protected $properties;

    protected function __construct($properties, $children)
    {
        parent::__construct($children);
        $this->properties = $properties;
    }
}