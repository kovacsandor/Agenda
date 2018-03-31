<?php

class PageDuty extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_ADD ?></h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>"
                  method="post">
                <label>
                    <span class="<?= P ?>-required">
                        Title
                    </span>
                    <input name="<?= KEY_DUTY_TITLE ?>"
                           type="text"
                           value="<?= Helper::getValue(KEY_DUTY_TITLE) ?>"
                           required>
                </label>
                <label>
                    Body
                    <textarea name="<?= KEY_DUTY_BODY ?>"
                              rows="3"><?= Helper::getValue(KEY_DUTY_BODY) ?></textarea>
                </label>
                <label>
                    Priority
                    <select name="<?= KEY_DUTY_PRIORITY ?>">
                        <option value="<?= VALUE_PRIORITY_NEGLIGIBLE ?>">Negligible</option>
                        <option value="<?= VALUE_PRIORITY_MODERATE ?>">Moderate</option>
                        <option value="<?= VALUE_PRIORITY_IMPORTANT ?>">Important</option>
                        <option value="<?= VALUE_PRIORITY_URGENT ?>">Urgent</option>
                        <option value="<?= VALUE_PRIORITY_CRITICAL ?>">Critical</option>
                    </select>
                </label>
                <label>
                    Done
                    <input name="<?= KEY_DUTY_IS_DONE ?>"
                           type="checkbox"
                           value="<?= VALUE_CHECKBOX_TRUE ?>">
                </label>
                <div class="<?= P ?>-button-container">
                    <button class="<?= P ?>-button <?= P ?>--blue"
                            type="submit">
                        Submit
                    </button>
                </div>
            </form>
            <?php
            Component::mount($this->children);
            ?>
        </section>
        <?php ;
    }
}