<?php

class Logo extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <div class="<?= P ?>-logo-container">
            <?php
            Component::mount(new Trust(file_get_contents(FILE_SVG_LOGO)));
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}