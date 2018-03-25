<?php

class Login extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1>Login</h1>
            <form>
                <label>
                    <span class="<?= P ?>-required">
                        Name
                    </span>
                    <input name="name"
                           type="text"
                           required>
                </label>
                <label>
                    <span class="<?= P ?>-required">
                        Password
                    </span>
                    <input name="password"
                           type="password"
                           required>
                </label>
                <div class="<?= P ?>-button-container">
                    <button class="<?= P ?>-button <?= P ?>--blue"
                            type="submit">
                        Submit
                    </button>
                    <a href="registration.php"
                       class="<?= P ?>-button <?= P ?>--teal">
                        Registration
                    </a>
                </div>
            </form>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}