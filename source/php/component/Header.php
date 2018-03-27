<?php

class Header extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <header>
            <?php
            Component::mount(new Menu(['isMain' => true], []));
            ?>
            <div class="<?= P ?>-message-container">
                <div class="<?= P ?>-container">
                    <?php
                    foreach (Model::getMessages() as $item) {
                        Component::mount(new Message([
                            'type' => $item->getType(),
                            'value' => $item->getValue(),
                        ], []));
                    }
                    Component::mount($this->children);
                    ?>
                </div>
            </div>
        </header>
        <?php ;
    }
}