<?php

class Menu extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    { ?>
        <nav class="<?= $this->properties['isMain'] ? P . '-menu-main' : '' ?>">
            <?php
            if ($this->properties['isMain']) {
                ?>
                <a href="<?= BASE_URL ?>"
                   class="<?= P ?>-button <?= P ?>--menu">
                    <?= Component::mount(new Logo([])) ?>
                </a>
                <?php
            }
            ?>
            <ul class="<?= $this->properties['isMain'] ? P . '-menu-list' : '' ?>">
                <?php
                if ($this->properties['isMain']) {
                    ?>
                    <li class="<?= P ?>-menu-item <?= P ?>--mobile">
                        <a href="#<?= ID_NAV ?>"
                           class="<?= P ?>-button <?= P ?>--menu">
                            <?= Component::mount(new Icon(['icon' => ICON_MENU], [])) ?>
                        </a>
                    </li>
                    <?php
                }
                foreach (Model::getMenu() as $item) {
                    if ($item->isVisible()) {
                        ?>
                        <li class="<?= $this->properties['isMain'] ? P . '-menu-item' : '' ?>">
                            <a href="<?= $item->getValue() ?>"
                               class="<?= P ?>-button <?= $this->properties['isMain'] ? P . '--menu' :
                                   P . '--list ' . P . '--teal' ?>
                                <?= $item->isActive() ? ' ' . P . '--active' : '' ?>">
                                <?= $item->getLabel() ?>
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