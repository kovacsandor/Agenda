<?php

include './php/includes.php';
include './php/globals.php';

new Session();

Request::handle();

Component::mount(new BasePage([]));

// Favicon