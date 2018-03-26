<?php

spl_autoload_register(function ($class_name) {
    switch ($class_name) {
        case 'BasePage':
        case 'Container':
        case 'Component':
        case 'Footer':
        case 'Header':
        case 'Icon':
        case 'ListItem':
        case 'Logo':
        case 'Main':
        case 'Menu':
        case 'PageHome':
        case 'PageLogin':
        case 'PageNotFound':
        case 'PageRegistration':
        case 'Trust':
        case 'UnorderedList':
            $directory = 'php/component';
            break;
        case 'LabelValue':
        case 'MenuItem':
        case 'Model':
        case 'Renderable':
            $directory = 'php/model';
            break;
        case 'Registration':
        case 'Request':
            $directory = 'php/request';
            break;
        default:
            throw new Exception('Unregistered class: ' . $class_name);
    }
    include $directory . '/' . $class_name . '.php';
});

include './php/globals.php';

if (sizeof($_POST) > 0) {
    new Registration();
}

Component::mount(new BasePage([]));