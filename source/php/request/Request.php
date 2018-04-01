<?php

abstract class Request
{
    protected function __construct()
    {

    }

    public static function handle()
    {
        $basename = basename($_SERVER['PHP_SELF']);
        if ($basename == PAGE_LOG_OUT) {
            new LogOut();
        }
        if ($basename == PAGE_DUTY_LIST) {
            new DutyList();
        }
        if (sizeof($_POST) > 0) {
            switch ($basename) {
                case PAGE_DUTY:
                    new DutyRequest();
                    break;
                case PAGE_LOGIN:
                    new Login();
                    break;
                case PAGE_REGISTRATION:
                    new Registration();
                    break;
                default:
                    throw new Exception('Unregistered page: ' . $basename);
            }
        }
    }

    protected abstract function action();

    protected function dataAdd($filename, $prefix, $message)
    {
        $_POST[KEY_ID] = uniqid($prefix);
        foreach ($_POST as $k => $v) {
            $_POST[$k] = json_encode($v);
        }
        $line = serialize($_POST) . PHP_EOL;
        $_POST = [];

        if (is_writable($filename)) {
            if (!$file = fopen($filename, 'a')) {
                Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Cannot open file ' . $filename));
                exit;
            }
            if (fwrite($file, $line) === FALSE) {
                Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Cannot write to file ' . $filename));
                exit;
            }
            $msg = isset($message) ? $message : 'Success, wrote to file ' . $filename;
            Model::setMessages(new ValueType(TYPE_MESSAGE_SUCCESS, $msg));
            fclose($file);
        } else {
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'The file ' . $filename . ' is not writable'));
        }
    }
}