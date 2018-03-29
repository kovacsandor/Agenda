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
                    ?>
                    <div class="<?= P ?>-message-container">
                        <?php
                        foreach (Model::getMessages() as $item) {
                            Component::mount(new Message([
                                'type' => $item->getType(),
                                'value' => $item->getValue(),
                            ], []));
                        }
                        ?>
                    </div>
                    <?php
                }
                $child = new UnorderedList([
                    new ListItem('Item:1'),
                    new ListItem(new Trust('<span>Item:2</span>')),
                    new ListItem('Item:3'),
                ]);
                switch (basename($_SERVER['PHP_SELF'])) {
                    case 'index.php':
                        $page = new PageHome([$child]);
                        break;
                    case 'login.php':
                        $page = new PageLogin([]);
                        break;
                    case 'registration.php':
                        $page = new PageRegistration([]);
                        break;
                    default:
                        $page = new PageNotFound([$child]);
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