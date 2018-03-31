<?php

class MessageContainer extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    {
        if (!isset($this->properties[PROPERTY_IS_MESSAGE_PRIVATE])
            || Helper::isUserLoggedIn() && !Helper::isUserRegular()) {
            ?>
            <div class="<?= P ?>-message-container">
                <?php
                foreach ($this->properties[PROPERTY_MESSAGES] as $message) {
                    Component::mount(new Message([
                        PROPERTY_TYPE => $message[PROPERTY_TYPE],
                        PROPERTY_VALUE => $message[PROPERTY_VALUE],
                    ], []));
                }
                ?>
            </div>
            <?php
        }
    }
}