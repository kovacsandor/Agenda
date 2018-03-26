<?php

class Registration extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->dataAdd(DATA_USERS, 'user-');
    }

    private function userGet()
    {
        foreach ($this->dataGet(DATA_USERS) as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    echo $key . ' ' . $k . ': ' . $v;
                    echo '<br>';
                }
            } else {
                echo $key . ': ' . $value;
                echo '<br>';
            }
        }
    }
}
