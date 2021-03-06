<?php

class Header extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <header>
            <?php
            Component::mount(new Menu([PROPERTY_IS_MAIN => true], []));
            Component::mount($this->children);
            ?>
        </header>
        <?php ;
    }
}