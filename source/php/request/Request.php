<?php

abstract class Request
{
    protected function __construct()
    {

    }

    protected function dataAdd($filename, $prefix)
    {
        $_POST['id'] = uniqid($prefix);
        $line = serialize($_POST) . PHP_EOL;
        $_POST = [];

        if (is_writable($filename)) {
            if (!$file = fopen($filename, 'a')) {
                Model::setMessages(new ValueType('--error', 'Cannot open file ' . $filename));
                exit;
            }
            if (fwrite($file, $line) === FALSE) {
                Model::setMessages(new ValueType('--error', 'Cannot write to file ' . $filename));
                exit;
            }
            Model::setMessages(new ValueType('--success', 'Success, wrote to file ' . $filename));
            fclose($file);
        } else {
            Model::setMessages(new ValueType('--error', 'The file ' . $filename . ' is not writable'));
        }
    }

    protected function dataGet($filename)
    {
        $result = [];
        $file = fopen($filename, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                array_push($result, unserialize($line));
            }
            if (!feof($file)) {
                Model::setMessages(new ValueType('--error', 'Error: unexpected fgets() fail\n'));
            }
            fclose($file);
        }
        return $result;
    }
}