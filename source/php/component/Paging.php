<?php

class Paging extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    {
        $count = Model::getPagingInformation()[KEY_PAGE_INFO_DUTY_COUNT];
        $current = Model::getPagingInformation()[KEY_PAGE_INFO_CURRENT_PAGE];
        $from = Model::getPagingInformation()[KEY_PAGE_INFO_DUTY_FROM];
        $last = Model::getPagingInformation()[KEY_PAGE_INFO_LAST];
        $to = Model::getPagingInformation()[KEY_PAGE_INFO_DUTY_TO];
        ?>
        <div class="<?= P ?>-paging-container">
            <div class="<?= P ?>-floats">
                <div class="<?= P ?>-float-start">
                    <div class="<?= P ?>-button-container">
                        <a class="<?= P ?>-button <?= P ?>--grey <?= $current == 1 ? P . '--disabled' : '' ?>"
                           href="<?= $_SERVER['PHP_SELF'] ?>">
                            <?= Component::mount(new Icon(['icon' => ICON_FIRST], [])) ?>
                        </a>
                        <a class="<?= P ?>-button <?= $current == 1 ? P . '--disabled' : '' ?>"
                           href="<?= $_SERVER['PHP_SELF'] . '?page=' . ($current - 1) ?>">
                            <?= Component::mount(new Icon(['icon' => ICON_PREVIOUS], [])) ?>
                        </a>
                    </div>
                </div>
                <div class="<?= P ?>-float-end">
                    <div class="<?= P ?>-button-container">
                        <a class="<?= P ?>-button <?= $current == $last ? P . '--disabled' : '' ?>"
                           href="<?= $_SERVER['PHP_SELF'] . '?page=' . ($current + 1) ?>">
                            <?= Component::mount(new Icon(['icon' => ICON_NEXT], [])) ?>
                        </a>
                        <a class="<?= P ?>-button <?= P ?>--grey <?= $current == $last ? P . '--disabled' : '' ?>"
                           href="<?= $_SERVER['PHP_SELF'] . '?page=' . $last ?>">
                            <?= Component::mount(new Icon(['icon' => ICON_LAST], [])) ?>
                        </a>
                    </div>
                </div>
                <div class="<?= P ?>-float-center">
                    <div class="<?= P ?>-current-page">
                        <?= $from ?>-<?= $to ?> / <?= $count ?>
                    </div>
                </div>
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}