<?php

class Message extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    { ?>
        <div class="<?= P ?>-message <?= P . '--' . $this->properties[PROPERTY_TYPE] ?>">
            <?php
            echo $this->properties[PROPERTY_VALUE];
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}