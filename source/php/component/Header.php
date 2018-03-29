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
            Component::mount(new Menu(['isMain' => true], []));
            Component::mount($this->children);
            ?>
        </header>
        <?php ;
    }
}