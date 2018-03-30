<?php

class PageLogin extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_LOGIN ?></h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>"
                  method="post">
                <label>
                    <span class="<?= P ?>-required">
                        Name
                    </span>
                    <input name="<?= KEY_USER_NAME ?>"
                           type="text"
                           required>
                </label>
                <label>
                    <span class="<?= P ?>-required">
                        Password
                    </span>
                    <input name="<?= KEY_USER_PASSWORD ?>"
                           type="password"
                           required>
                </label>
                <div class="<?= P ?>-button-container">
                    <button class="<?= P ?>-button <?= P ?>--blue"
                            type="submit">
                        Submit
                    </button>
                    <a href="<?= PAGE_REGISTRATION ?>"
                       class="<?= P ?>-button <?= P ?>--teal">
                        <?= LABEL_PAGE_REGISTRATION ?>
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