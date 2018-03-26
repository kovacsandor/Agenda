<?php

abstract class Request
{
    protected function __construct()
    {
        //
    }

    protected function dataAdd($filename, $prefix)
    {
        $_POST['id'] = uniqid($prefix);
        $line = serialize($_POST) . PHP_EOL;
        $_POST = array();

        if (is_writable($filename)) {
            if (!$file = fopen($filename, 'a')) {
                echo 'Cannot open file ' . $filename;
                exit;
            }
            if (fwrite($file, $line) === FALSE) {
                echo 'Cannot write to file ' . $filename;
                exit;
            }
            echo 'Success, wrote to file ' . $filename;
            fclose($file);
        } else {
            echo 'The file ' . $filename . ' is not writable';
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
                echo 'Error: unexpected fgets() fail\n';
            }
            fclose($file);
        }
        return $result;
    }
}