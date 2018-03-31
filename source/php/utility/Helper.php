<?php

class Helper
{

    public static function getData($filename)
    {
        $result = [];
        $file = fopen($filename, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $l = unserialize($line);
                foreach ($l as $k => $v) {
                    $l[$k] = json_decode($v);
                }
                array_push($result, $l);
            }
            if (!feof($file)) {
                Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Error: unexpected fgets() fail\n'));
            }
            fclose($file);
        }
        return $result;
    }

    public static function getValue($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : '';
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION[SESSION_USER_NAME]);
    }

    public static function isUserRegular()
    {
        return isset($_SESSION[SESSION_USER_ROLE]) && $_SESSION[SESSION_USER_ROLE] == ROLE_USER;
    }

    public static function isUserRevisor()
    {
        return isset($_SESSION[SESSION_USER_ROLE]) && $_SESSION[SESSION_USER_ROLE] == ROLE_REVISOR;
    }

    public static function isUserAdmin()
    {
        return isset($_SESSION[SESSION_USER_ROLE]) && $_SESSION[SESSION_USER_ROLE] == ROLE_ADMIN;
    }
}