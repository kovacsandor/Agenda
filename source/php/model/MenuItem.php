<?php

class MenuItem extends Renderable
{
    private $isActive;
    private $label;
    private $link;

    public function __construct($label, $link, $isActive, $isVisible)
    {
        parent::__construct($isVisible);
        $this->isActive = $isActive;
        $this->label = $label;
        $this->link = $link;
    }

    public function isActive()
    {
        return $this->isActive;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getLink()
    {
        return $this->link;
    }
}
