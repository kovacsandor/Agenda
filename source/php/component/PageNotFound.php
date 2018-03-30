<?php

class PageNotFound extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_404 ?></h1>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}