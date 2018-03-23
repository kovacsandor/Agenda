<?php

class Menu extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <nav>
            <ul class="<?= P; ?>-menu-list">
                <?php
                foreach (Model::getMenu() as $item) {
                    if ($item->isVisible()) {
                        ?>
                        <li class="<?= P; ?>-menu-item">
                            <a href="<?= $item->getLink(); ?>"
                               class="<?= P; ?>-menu-link <?= $item->isActive() ? P . "--active" : ""; ?>">
                                <?= $item->getLabel(); ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <?php
            Component::mount($this->children);
            ?>
        </nav>
        <?php ;
    }
}