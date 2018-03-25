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
                $child = new UnorderedList([
                    new ListItem('Item:1'),
                    new ListItem(new Trust('<span>Item:2</span>')),
                    new ListItem('Item:3'),
                ]);
                switch (basename($_SERVER['PHP_SELF'])) {
                    case 'index.php':
                        $page = new Home([$child]);
                        break;
                    case 'login.php':
                        $page = new Login([]);
                        break;
                    case 'registration.php':
                        $page = new Registration([]);
                        break;
                    default:
                        $page = new NonExistent([$child]);
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