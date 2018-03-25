<?php

class PageLogin extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);

//        $file = fopen(DATA_USERS, 'r');
//        if ($file) {
//            while (($line = fgets($file)) !== false) {
//                foreach (unserialize($line) as $key => $value) {
//                    if (is_array($value)) {
//                        foreach ($value as $k => $v) {
//                            echo $key . ' ' . $k . ': ' . $v;
//                            echo '<br>';
//                        }
//                    } else {
//                        echo $key . ': ' . $value;
//                        echo '<br>';
//                    }
//                }
//            }
//            if (!feof($file)) {
//                echo 'Error: unexpected fgets() fail\n';
//            }
//            fclose($file);
//        }
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