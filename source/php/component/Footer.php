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
                    <div class="<?= P; ?>-col <?= P; ?>--md <?= P; ?>--25">
                        1
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--md <?= P; ?>--25">
                        2
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--md <?= P; ?>--25">
                        3
                    </div>
                    <div class="<?= P; ?>-col <?= P; ?>--md <?= P; ?>--25">
                        4
                    </div>
                </div>
                <?php
                Component::mount($this->children);
                ?>
            </div>
        </footer>
        <?php ;
    }
}