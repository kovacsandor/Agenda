<?php

class PageHome extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_HOME ?></h1>
            <div class="<?= P ?>-button-container">
                <button class="<?= P ?>-button <?= P ?>--active">Button</button>
                <button class="<?= P ?>-button">Button</button>
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}