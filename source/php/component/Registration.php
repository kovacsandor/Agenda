<?php

class Registration extends Component
{
    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <section class="<?= P ?>-section <?= P ?>--white">
            <h1>Registration</h1>
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
                           required>
                </label>
                <label>
                    About
                    <textarea name="about"
                              rows="3">
                    </textarea>
                </label>
                <label>
                    Gender
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
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
                        Where you heard from us
                    </legend>
                    <label>
                        Papers
                        <input name="where"
                               type="checkbox"
                               value="papers">
                    </label>
                    <label>
                        Internet
                        <input name="where"
                               type="checkbox"
                               value="Internet">
                    </label>
                    <label>
                        School
                        <input name="where"
                               type="checkbox"
                               value="school">
                    </label>
                    <label>
                        Office
                        <input name="where"
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
}