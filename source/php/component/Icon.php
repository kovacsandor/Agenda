<?php

class Icon extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    { ?>
        <div class="<?= P ?>-icon-container">
            <?php
            Component::mount(new Trust(file_get_contents($this->properties['logo'])));
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}