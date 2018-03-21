<?php

class Main extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <main>
            <?php
            Component::mount($this->children);
            ?>
        </main>
        <?php ;
    }
}