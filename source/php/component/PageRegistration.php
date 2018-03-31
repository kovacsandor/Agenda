<?php

class PageRegistration extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1><?= LABEL_PAGE_REGISTRATION ?></h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>"
                  method="post">
                <label>
                    <span class="<?= P ?>-required">
                        Name
                    </span>
                    <input name="<?= KEY_USER_NAME ?>"
                           type="text"
                           value="<?= Helper::getValue(KEY_USER_NAME) ?>"
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
                <label>
                    <span class="<?= P ?>-required">
                        Password again
                    </span>
                    <input name="<?= KEY_USER_PASSWORD_AGAIN ?>"
                           type="password"
                           required>
                </label>
                <label>
                    <span class="<?= P ?>-required">
                        Email
                    </span>
                    <input name="<?= KEY_USER_EMAIL ?>"
                           type="email"
                           value="<?= Helper::getValue(KEY_USER_EMAIL) ?>"
                           required>
                </label>
                <label>
                    About
                    <textarea name="<?= KEY_USER_ABOUT ?>"
                              rows="3"><?= Helper::getValue(KEY_USER_ABOUT) ?></textarea>
                </label>
                <label>
                    Profile picture
                    <input name="image"
                           type="file">
                </label>
                <?php
                Component::mount(new MessageContainer([
                    PROPERTY_IS_MESSAGE_PRIVATE => true,
                    PROPERTY_MESSAGES => [[
                        PROPERTY_TYPE => TYPE_MESSAGE_WARNING,
                        PROPERTY_VALUE => 'Profile picture is not working.',
                    ]],
                ], []))
                ?>
                <label>
                    Education
                    <select name="education">
                        <option value="">Please choose...</option>
                        <option value="elementary">Elementary</option>
                        <option value="high-school">High school</option>
                        <option value="college">College</option>
                        <option value="university">University</option>
                    </select>
                </label>
                <?php
                if (Helper::isUserAdmin()) {
                    ?>
                    <label>
                        Role
                        <select name="<?= KEY_USER_ROLE ?>">
                            <?php
                            foreach (Model::getRoles() as $item) {
                                ?>
                                <option value="<?= $item->getValue() ?>"><?= $item->getLabel() ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </label>
                    <?php
                }
                ?>
                <fieldset>
                    <legend>
                        Gender
                    </legend>
                    <label>
                        Male
                        <input name="gender"
                               type="radio"
                               value="male">
                    </label>
                    <label>
                        Female
                        <input name="gender"
                               type="radio"
                               value="female">
                    </label>
                </fieldset>
                <fieldset>
                    <legend>
                        Where did you hear from us?
                    </legend>
                    <label>
                        Papers
                        <input name="where[]"
                               type="checkbox"
                               value="papers">
                    </label>
                    <label>
                        Internet
                        <input name="where[]"
                               type="checkbox"
                               value="internet">
                    </label>
                    <label>
                        School
                        <input name="where[]"
                               type="checkbox"
                               value="school">
                    </label>
                    <label>
                        Office
                        <input name="where[]"
                               type="checkbox"
                               value="office">
                    </label>
                </fieldset>
                <label>
                    <span class="<?= P ?>-required">
                        Confirm reading terms and conditions
                    </span>
                    <input name="<?= KEY_USER_TERMS ?>"
                           type="checkbox"
                           value="<?= VALUE_CHECKBOX_TRUE ?>"
                           required>
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