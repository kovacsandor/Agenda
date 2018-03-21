<?php

class ListItem extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <li>
            <?php
            Component::mount($this->children);
            ?>
        </li>
        <?php ;
    }
}