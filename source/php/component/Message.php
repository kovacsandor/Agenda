<?php

class Message extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    { ?>
        <div class="<?= P ?>-message <?= P . $this->properties['type'] ?>">
            <?php
            echo $this->properties['value'];
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}