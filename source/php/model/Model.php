<?php

class Model
{
    private static $messages = [];

    public static function getMenu()
    {
        return [
            new MenuItem('Home', basename($_SERVER['PHP_SELF']) == 'index.php', true, BASE_URL),
            new MenuItem('Login', basename($_SERVER['PHP_SELF']) == 'login.php', true, 'login.php'),
            new MenuItem('Registration', true, basename($_SERVER['PHP_SELF']) == 'registration.php', 'registration.php'),
        ];
    }

    public static function getRoles()
    {
        return [
            new ValueLabel('User', 'user'),
            new ValueLabel('Revisor', 'revisor'),
            new ValueLabel('Admin', 'admin'),
        ];
    }

    public static function getMessages()
    {
        return Model::$messages;
    }

    public static function setMessages($message)
    {
        Model::$messages[] = $message;
    }
}
