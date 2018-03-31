<?php

class PageDutyList extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_DUTIES ?></h1>
            <?php
            Component::mount(new Paging([]));
            $duties = Model::getDuties();
            if (sizeof($duties) < 1) {
                Component::mount(new MessageContainer([
                    PROPERTY_IS_MESSAGE_PRIVATE => true,
                    PROPERTY_MESSAGES => [[
                        PROPERTY_TYPE => TYPE_MESSAGE_INFO,
                        PROPERTY_VALUE => 'There are no duties found.',
                    ]],
                ], []));
            } else {
                ?>
                <div class="<?= P ?>-duty-container">
                    <?php
                    foreach ($duties as $duty) {
                        Component::mount(new Duty([
                            PROPERTY_DUTY_BODY => $duty[KEY_DUTY_BODY],
                            PROPERTY_DUTY_IS_DONE => $duty[KEY_DUTY_IS_DONE],
                            PROPERTY_DUTY_PRIORITY => $duty[KEY_DUTY_PRIORITY],
                            PROPERTY_DUTY_TIME => $duty[KEY_DUTY_TIME],
                            PROPERTY_DUTY_TITLE => $duty[KEY_DUTY_TITLE],
                        ], []));
                    }
                    ?>
                </div>
                <?php
                Component::mount(new Paging([]));
            }
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}