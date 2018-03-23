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
            <?php
            switch (basename($_SERVER['PHP_SELF'])) {
                case 'index.php':
                    $page = new Home([]);
                    break;
                case 'login.php':
                    $page = new Login([]);
                    break;
                default:
                    $page = new NonExistent([]);
                    break;
            }
            Component::mount([$page]);
            Component::mount($this->children);
            ?>
        </main>
        <?php ;
    }
}