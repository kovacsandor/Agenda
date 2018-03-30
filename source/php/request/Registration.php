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
        $canBeAdded = true;
        $users = $this->dataGet(DATA_USERS);
        $names = array_filter($users, [new Callback(KEY_USER_NAME), 'filter']);
        $emails = array_filter($users, [new Callback(KEY_USER_EMAIL), 'filter']);

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
            $this->dataAdd(DATA_USERS, 'user-', $message);
            new Redirect(PAGE_LOGIN);
        }
    }

//    TODO Delete
    protected function userGet()
    {
        foreach ($this->dataGet(DATA_USERS) as $keys) {
            foreach ($keys as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        echo $key . ' ' . $k . ': ' . $v;
                        echo '<br>';
                    }
                } else {
                    echo $key . ': ' . $value;
                    echo '<br>';
                }
            }
        }
    }
}