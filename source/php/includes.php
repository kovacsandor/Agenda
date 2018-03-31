<?php

spl_autoload_register(function ($class_name) {
    switch ($class_name) {
        case 'BasePage':
        case 'Container':
        case 'Component':
        case 'Duty':
        case 'Footer':
        case 'Header':
        case 'Icon':
        case 'Logo':
        case 'Main':
        case 'Menu':
        case 'Message':
        case 'MessageContainer':
        case 'PageDuty':
        case 'PageDutyList':
        case 'PageHome':
        case 'PageLogin':
        case 'PageNotFound':
        case 'PageRegistration':
        case 'Paging':
        case 'Trust':
            $directory = 'php/component';
            break;
        case 'MenuItem':
        case 'Model':
        case 'Renderable':
        case 'Value':
        case 'ValueLabel':
        case 'ValueType':
            $directory = 'php/model';
            break;
        case 'DutyList':
        case 'DutyRequest':
        case 'Login':
        case 'LogOut':
        case 'Registration':
        case 'Request':
            $directory = 'php/request';
            break;
        case 'Callback':
        case 'Helper':
        case 'Redirect':
        case 'Session':
            $directory = 'php/utility';
            break;
        default:
            throw new Exception('Unregistered class: ' . $class_name);
    }
    include $directory . '/' . $class_name . '.php';
});