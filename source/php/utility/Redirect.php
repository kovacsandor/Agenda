<?php

class Redirect
{
    public function __construct($page)
    {
        $this->redirect($page);
    }

    private function redirect($page)
    {
        $_SESSION[SESSION_MESSAGES] = serialize(Model::getMessages());
        header('Location: ' . $page);
        exit;
    }
}