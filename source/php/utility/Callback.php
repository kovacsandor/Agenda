<?php

class Callback
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function filterPost($value)
    {
        return $value[$this->key] == $_POST[$this->key];
    }

    public function filterSession($value)
    {
        return $value[$this->key] == $_SESSION[SESSION_USER_NAME];
    }
}