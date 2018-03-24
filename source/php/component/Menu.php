<?php

class Menu extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    { ?>
        <nav class="<?= $this->properties['isMain'] ? P . '-menu-main' : ''; ?>">
            <ul class="<?= $this->properties['isMain'] ? P . '-menu-list' : ''; ?>">
                <?php
                foreach (Model::getMenu() as $item) {
                    if ($item->isVisible()) {
                        ?>
                        <li class="<?= $this->properties['isMain'] ? P . '-menu-item' : ''; ?>">
                            <a href="<?= $item->getLink(); ?>"
                               class="<?= P ?>-button <?= $this->properties['isMain'] ? P . '--menu' :
                                   P . '--list ' . P . '--teal'; ?>
                                <?= $item->isActive() ? ' ' . P . '--active' : ''; ?>">
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