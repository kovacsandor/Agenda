<?php

class PageHome extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_HOME ?></h1>
            <h2>Try it on mobile</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id aliquam erat. Sed malesuada dictum
                ipsum, ac interdum ipsum pretium vel. Aliquam nec quam arcu. Vestibulum vel nulla ut lectus consequat
                pretium.
            </p>
            <div class="<?= P ?>-image-container">
                <img alt=" Try it on mobile"
                     class="<?= P ?>-image"
                     height="320"
                     width="480"
                     src="image/mobile.png"/>
            </div>
            <p>
                Fusce molestie ipsum ac pulvinar varius.
            </p>
            <ul class="<?= P ?>-list">
                <li>
                    Maecenas eros elit
                </li>
                <li>
                    Nam placerat egestas
                </li>
                <li>
                    Duis leo tortor
                </li>
            </ul>
            <p>
                Donec ac enim vitae est lobortis volutpat eget non orci. In eget leo sapien. Pellentesque eget nisl
                condimentum, blandit tellus eget, lobortis nunc.
            </p>
            <h2>Demo version login</h2>
            <div class="<?= P ?>-table-container <?= P ?>--white">
                <table>
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach (Helper::getData(DATA_USERS) as $user) {
                        ?>
                        <tr>
                            <td><?= $user[KEY_USER_NAME] ?></td>
                            <td><?= $user[KEY_USER_PASSWORD] ?></td>
                            <td><?= $user[KEY_USER_ROLE] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}