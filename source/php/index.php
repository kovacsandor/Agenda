<?php

spl_autoload_register(function ($class_name) {
    switch ($class_name) {
        case 'BasePage':
        case 'Component':
        case 'Footer':
        case 'Header':
        case 'Home':
        case 'ListItem':
        case 'Login':
        case 'Main':
        case 'Menu':
        case 'NonExistent':
        case 'Trust':
        case 'UnorderedList':
            $directory = 'php/component';
            break;
        case 'MenuItem':
        case 'Model':
        case 'Renderable':
            $directory = 'php/model';
            break;
        default:
            throw new Exception('Unregistered class: ' . $class_name);
    }
    include $directory . '/' . $class_name . '.php';
});

include './php/globals.php';

Component::mount(new BasePage([]));