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
        $id = $this->properties[PROPERTY_DUTY_ID];
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
                    <form action="<?= PAGE_DUTY ?>"
                          method="post">
                        <input name="<?= KEY_ID ?>"
                               type="hidden"
                               value="<?= $id ?>">
                        <div class="<?= P ?>-button-container">
                            <input class="<?= P ?>-button <?= $isDone ? '' : P . '--green' ?>"
                                   name="<?= $isDone ? KEY_LIST_DUTY_SET_UNDONE : KEY_LIST_DUTY_SET_DONE ?>"
                                   type="submit"
                                   value="Mark as <?= $isDone ? 'undone' : 'done' ?>">
                            <input class="<?= P ?>-button <?= $isDone ? P . '--red' : '' ?>"
                                   name="<?= KEY_LIST_DUTY_REMOVE ?>"
                                   type="submit"
                                   value="Remove">
                        </div>
                    </form>
                </div>
            </div>
            <?php
            Component::mount($this->children);
            ?>
        </div>
        <?php ;
    }
}