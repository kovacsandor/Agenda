<?php

spl_autoload_register(function ($class_name) {
    switch ($class_name) {
        case 'BasePage':
        case 'Component':
        case 'Footer':
        case 'Header':
        case 'ListItem':
        case 'Main':
        case 'Trust':
        case 'UnorderedList':
            $directory = 'php/component';
            break;
        default:
            throw new Exception('Unregistered class: ' . $class_name);
    }
    include $directory . '/' . $class_name . '.php';
});

Component::mount(new BasePage([]));

echo "home";