<?php

class Login extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->action();
    }

    protected function action()
    {
        if (Helper::isUserLoggedIn()) {
            Model::setMessages(new ValueType(TYPE_MESSAGE_WARNING, 'You already logged in.'));
            new Redirect(PAGE_HOME);
        }

        $canBeLoggedIn = true;
        $users = array_filter(Helper::getData(DATA_USERS), [new Callback(KEY_USER_NAME), CALLBACK_FILTER_POST]);
        $user = sizeof($users) > 0 ? array_values($users)[0] : null;

        $name = $_POST[KEY_USER_NAME];
        $password = $_POST[KEY_USER_PASSWORD];

        if (empty($name)) {
            $canBeLoggedIn = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Name\' is required.'));
        }
        if (empty($password)) {
            $canBeLoggedIn = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Password\' is required.'));
        }
        if (!isset($user)) {
            $canBeLoggedIn = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Name \'' . $name . '\' is not found in the database.'));
        }
        if (isset($user) && $password != $user[KEY_USER_PASSWORD]) {
            $canBeLoggedIn = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Password doesn\'t match with user\'s password.'));
        }
        if ($canBeLoggedIn) {
            $message = 'Success, user \'' . $user[KEY_USER_NAME] . '\' is logged in.';
            Model::setMessages(new ValueType(TYPE_MESSAGE_SUCCESS, $message));
            $_SESSION[SESSION_USER_ROLE] = $user[KEY_USER_ROLE];
            $_SESSION[SESSION_USER_NAME] = $user[KEY_USER_NAME];
            $_SESSION[SESSION_USER_TIMEOUT] = time();
            new Redirect(PAGE_DUTY_LIST);
        }
    }
}