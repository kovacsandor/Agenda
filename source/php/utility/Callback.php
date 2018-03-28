<?php

class Callback
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function filter($value)
    {
        return $value[$this->key] == $_POST[$this->key];
    }
}