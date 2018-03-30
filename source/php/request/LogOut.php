<?php

class LogOut extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->action();
    }

    protected function action()
    {
        $message = 'User \'' . $_SESSION[SESSION_USER_NAME] . '\' is logged out.';
        Model::setMessages(new ValueType(TYPE_MESSAGE_INFO, $message));
        unset($_SESSION[SESSION_USER_ROLE]);
        unset($_SESSION[SESSION_USER_NAME]);
        unset($_SESSION[SESSION_USER_TIMEOUT]);
        new Redirect(PAGE_LOGIN);
    }
}