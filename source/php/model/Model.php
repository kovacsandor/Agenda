<?php

class Model
{
    private static $duties = [];
    private static $messages = [];
    private static $pagingInformation = [];

    public static function getMenu()
    {
        $basename = basename($_SERVER['PHP_SELF']);
        $isUserLoggedIn = Helper::isUserLoggedIn();
        $canRegister = $basename == PAGE_REGISTRATION || Helper::isUserAdmin();
        return [
            new MenuItem(LABEL_PAGE_HOME, $basename == PAGE_HOME, true, URL_BASE),
            new MenuItem(LABEL_PAGE_ADD, $basename == PAGE_DUTY, $isUserLoggedIn, PAGE_DUTY),
            new MenuItem(LABEL_PAGE_DUTIES, $basename == PAGE_DUTY_LIST, $isUserLoggedIn, PAGE_DUTY_LIST),
            new MenuItem(LABEL_PAGE_LOGIN, $basename == PAGE_LOGIN, !$isUserLoggedIn, PAGE_LOGIN),
            new MenuItem(LABEL_PAGE_REGISTRATION, $basename == PAGE_REGISTRATION, $canRegister, PAGE_REGISTRATION),
            new MenuItem(LABEL_PAGE_LOG_OUT, $basename == PAGE_LOG_OUT, $isUserLoggedIn, PAGE_LOG_OUT),
        ];
    }

    public static function getRoles()
    {
        return [
            new ValueLabel(ucfirst(ROLE_USER), ROLE_USER),
            new ValueLabel(ucfirst(ROLE_REVISOR), ROLE_REVISOR),
            new ValueLabel(ucfirst(ROLE_ADMIN), ROLE_ADMIN),
        ];
    }

    public static function getDuties()
    {
        return Model::$duties;
    }

    public static function setDuties($duties)
    {
        Model::$duties = $duties;
    }

    public static function getMessages()
    {
        return Model::$messages;
    }

    public static function setMessages($message)
    {
        if (is_array($message)) {
            Model::$messages = Model::getMessages() + $message;
        } else {
            Model::$messages[] = $message;
        }
    }

    public static function getPagingInformation()
    {
        return Model::$pagingInformation;
    }

    public static function setPagingInformation($pagingInformation)
    {
        Model::$pagingInformation = $pagingInformation;
    }
}
