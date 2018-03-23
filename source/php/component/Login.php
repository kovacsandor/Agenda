<?php

class Login extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section>
            <h1>Login</h1>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}