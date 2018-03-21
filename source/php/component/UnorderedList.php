<?php

class UnorderedList extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <ul>
            <?php
            Component::mount($this->children);
            ?>
        </ul>
        <?php ;
    }
}