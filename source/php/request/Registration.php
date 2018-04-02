<?php

class Registration extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->action();
    }

    protected function action()
    {
        if (Helper::isUserLoggedIn() && !Helper::isUserAdmin()) {
            Model::setMessages(new ValueType(TYPE_MESSAGE_WARNING, 'You must log in as an administrator.'));
            new Redirect(PAGE_LOGIN);
        }
        $canBeAdded = true;
        $users = Helper::getData(DATA_USERS);
        $names = array_filter($users, [new Callback(KEY_USER_NAME), CALLBACK_FILTER_POST]);
        $emails = array_filter($users, [new Callback(KEY_USER_EMAIL), CALLBACK_FILTER_POST]);

        $email = $_POST[KEY_USER_EMAIL];
        $name = $_POST[KEY_USER_NAME];
        $password = $_POST[KEY_USER_PASSWORD];
        $password_again = $_POST[KEY_USER_PASSWORD_AGAIN];

        if (empty($name)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Name\' is required.'));
        }
        if (empty($password)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Password\' is required.'));
        }
        if (empty($password_again)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Password again\' is required.'));
        }
        if (empty($email)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Email\' is required.'));
        }
        if (isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Email \'' . $email . '\' is invalid.'));
        }
        if (!isset($_POST[KEY_USER_TERMS])) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'You must confirm reading terms and conditions.'));
        }
        if (sizeof($names) > 0) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Name \'' . $name . '\' is already taken.'));
        }
        if (sizeof($emails) > 0) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Email \'' . $email . '\' is already taken.'));
        }
        if ($password != $password_again) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Passwords don\'t match.'));
        }
        if ($canBeAdded) {
            $message = 'Success, added user \'' . $name . '\' to database.';
            if (!isset($_POST[KEY_USER_ROLE])) {
                $_POST[KEY_USER_ROLE] = ROLE_USER;
            }
            $this->dataAdd(DATA_USERS, 'user-', $message);
            new Redirect(PAGE_LOGIN);
        }
    }
}