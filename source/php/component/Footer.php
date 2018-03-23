<?php

class Footer extends Component
{

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <footer>
            <div class="<?= P; ?>-container">
                <div class="<?= P; ?>-row">
                    <div class="<?= P; ?>-col <?= P; ?>--sm-50 <?= P; ?>--lg-25">
                        <h6>Lorem ipsum</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia, sapien at commodo
                            pellentesque, quam urna iaculis ligula, in ultrices sem nibh ut dolor.</p>
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--sm-50 <?= P; ?>--lg-25">
                        <h6>Quisque vitae</h6>
                        <p>Quisque vitae mauris velit. Duis eget dui sit amet ipsum luctus eleifend. Ut euismod aliquet
                            erat porta ullamcorper. Praesent metus massa, blandit ac nunc vel, finibus fringilla lacus.
                            Cras semper id leo ac pharetra.</p>
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--sm-50 <?= P; ?>--lg-25">
                        <h6>Praesent ultrices</h6>
                        <p>Praesent ultrices eleifend est in elementum. Donec quis dapibus felis. Duis volutpat magna
                            ultricies augue scelerisque, maximus suscipit justo suscipit.</p>
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--sm-50 <?= P; ?>--lg-25">
                        <h6>Navigation</h6>
                        <nav>
                            <ul>
                                <?php
                                foreach (Model::getMenu() as $item) {
                                    if ($item->isVisible()) {
                                        ?>
                                        <li>
                                            <a href="<?= $item->getLink(); ?>"
                                               class="<?= P; ?>-list-link <?= P; ?>--teal <?= $item->isActive() ? P . "--active" : ""; ?>">
                                                <?= $item->getLabel(); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="<?= P; ?>-copyright">
                Copyright
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </footer>
        <?php ;
    }
}