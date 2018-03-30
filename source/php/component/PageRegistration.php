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
            <h1>Registration</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>"
                  method="post">
                <label>
                    <span class="<?= P ?>-required">
                        Name
                    </span>
                    <input name="name"
                           type="text"
                           value="<?= $this->get('name') ?>"
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
                <label>
                    <span class="<?= P ?>-required">
                        Password again
                    </span>
                    <input name="password-again"
                           type="password"
                           required>
                </label>
                <label>
                    <span class="<?= P ?>-required">
                        Email
                    </span>
                    <input name="email"
                           type="email"
                           value="<?= $this->get('email') ?>"
                           required>
                </label>
                <label>
                    About
                    <textarea name="about"
                              rows="3"><?= $this->get('about') ?></textarea>
                </label>
                <label>
                    Profile picture
                    <input name="image"
                           type="file">
                </label>
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
                <label>
                    Role
                    <select name="role">
                        <?php
                        foreach (Model::getRoles() as $item) {
                            ?>
                            <option value="<?= $item->getValue() ?>"><?= $item->getLabel() ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
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
                    <input name="terms"
                           type="checkbox"
                           value="confirmed"
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

    private function get($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : '';
    }
}