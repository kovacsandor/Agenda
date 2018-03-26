<?php

class Model
{
    public static function getMenu()
    {
        return array(
            new MenuItem('Home', BASE_URL, basename($_SERVER['PHP_SELF']) == 'index.php', true),
            new MenuItem('Login', 'login.php', basename($_SERVER['PHP_SELF']) == 'login.php', true),
            new MenuItem('Registration', 'registration.php', true, basename($_SERVER['PHP_SELF']) == 'registration.php'),
        );
    }

    public static function getRoles()
    {
        return array(
            new LabelValue('User', 'user'),
            new LabelValue('Revisor', 'revisor'),
            new LabelValue('Admin', 'admin'),
        );
    }
}
