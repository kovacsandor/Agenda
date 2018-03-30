<?php

class Session
{
    public function __construct()
    {
        $this->start();
    }

    private function start()
    {
        session_start();
        if (isset($_SESSION[SESSION_MESSAGES])) {
            Model::setMessages(unserialize($_SESSION[SESSION_MESSAGES]));
            unset($_SESSION[SESSION_MESSAGES]);
        }
    }
}