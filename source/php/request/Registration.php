<?php

class Registration extends Request
{
    public function __construct()
    {
        parent::__construct();
        $user = serialize($_POST) . PHP_EOL;
        $_POST = array();

        if (is_writable(DATA_USERS)) {
            if (!$file = fopen(DATA_USERS, 'a')) {
                echo 'Cannot open file ' . DATA_USERS;
                exit;
            }
            if (fwrite($file, $user) === FALSE) {
                echo 'Cannot write to file ' . DATA_USERS;
                exit;
            }
            echo 'Success, wrote to file ' . DATA_USERS;
            fclose($file);
        } else {
            echo 'The file ' . DATA_USERS . ' is not writable';
        }
    }
}
