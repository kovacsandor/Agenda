<?php

class Model
{
    public static function getMenu()
    {
        return array(
            new MenuItem('Home', BASE_URL, basename($_SERVER['PHP_SELF']) == 'index.php', true),
            new MenuItem('Login', 'login.php', basename($_SERVER['PHP_SELF']) == 'login.php', true),
        );
    }
}
