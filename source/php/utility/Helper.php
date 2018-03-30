<?php

class Helper
{
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