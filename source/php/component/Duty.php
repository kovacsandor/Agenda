<?php

class Duty extends Container
{
    public function __construct($properties, $children)
    {
        parent::__construct($properties, $children);
    }

    protected function render()
    {
        $body = $this->properties[PROPERTY_DUTY_BODY];
        $isDone = !empty($this->properties[PROPERTY_DUTY_IS_DONE]);
        $priority = $this->properties[PROPERTY_DUTY_PRIORITY];
        $datetime = date('c', $this->properties[PROPERTY_DUTY_TIME]);
        $date = date('j F Y | H:i', $this->properties[PROPERTY_DUTY_TIME]);
        $title = $this->properties[PROPERTY_DUTY_TITLE];
        ?>
        <div class="<?= P ?>-duty">
            <div class="<?= P ?>-floats">
                <div class="<?= P ?>-float-start">
                    <div class="<?= P ?>-priority-container <?= !$isDone ? P . '--' . $priority : '' ?>">
                        <?php
                        Component::mount(new Trust(file_get_contents(FILE_SVG_PRIORITY)));
                        Component::mount($this->children);
                        ?>
                    </div>
                </div>
                <div class="<?= P ?>-float-center">
                    <h2 class=" <?= P ?>-duty-title
                    ">
                        <?= $title ?>
                    </h2>
                    <time class="<?= P ?>-duty-time"
                          datetime="<?= $datetime ?>">
                        <?= $date ?>
                    </time>
                    <p class="<?= P ?>-duty-body <?= $isDone ? P . '--done' : '' ?>"><?= $body ?></p>
                    <div class="<?= P ?>-button-container">
                        <button class="<?= P ?>-button <?= $isDone ? '' : P . '--green' ?>">
                            Mark as <?= $isDone ? 'undone' : 'done' ?>
                        </button>
                        <button class="<?= P ?>-button <?= $isDone ? P . '--red' : '' ?>">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}