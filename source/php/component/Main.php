<?php

class Main extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <main>
            <div class="<?= P ?>-container">
                <?php
                if (Model::getMessages()) {
                    $messages = [];
                    foreach (Model::getMessages() as $item) {
                        $messages[] = [
                            PROPERTY_TYPE => $item->getType(),
                            PROPERTY_VALUE => $item->getValue(),
                        ];
                    }
                    Component::mount(new MessageContainer([
                        PROPERTY_MESSAGES => $messages,
                    ], []));
                }
                switch (basename($_SERVER['PHP_SELF'])) {
                    case PAGE_ADD:
                        $page = new PageDuty([]);
                        break;
                    case PAGE_DUTIES:
                        $page = new PageDutyList([]);
                        break;
                    case PAGE_HOME:
                        $page = new PageHome([]);
                        break;
                    case PAGE_LOGIN:
                        $page = new PageLogin([]);
                        break;
                    case PAGE_REGISTRATION:
                        $page = new PageRegistration([]);
                        break;
                    default:
                        $page = new PageNotFound([]);
                        break;
                }
                Component::mount([$page]);
                Component::mount($this->children);
                ?>
            </div>
        </main>
        <?php ;
    }
}