<?php

class Trust extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    {
        echo $this->children;
    }
}