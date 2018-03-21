<?php

class Footer extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <footer>
            <?php
            Component::mount($this->children);
            ?>
        </footer>
        <?php ;
    }
}