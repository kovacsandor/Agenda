<?php

class Registration extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->addUser();
    }

    private function addUser()
    {
        $canBeAdded = true;
        $users = $this->dataGet(DATA_USERS);
        $name = array_filter($users, [new Callback('name'), 'filter']);
        $email = array_filter($users, [new Callback('email'), 'filter']);

        if ($_POST['name'] == '') {
            $canBeAdded = false;
            Model::setMessages(new ValueType('--error', 'Field \'Name\' is required.'));
        }
        if ($_POST['password'] == '') {
            $canBeAdded = false;
            Model::setMessages(new ValueType('--error', 'Field \'Password\' is required.'));
        }
//        if ($_POST['password-again'] == '') {
//            $canBeAdded = false;
//            Model::setMessages(new ValueType('--error', 'Field \'Password again\' is required.'));
//        }
        if ($_POST['email'] == '') {
            $canBeAdded = false;
            Model::setMessages(new ValueType('--error', 'Field \'Email\' is required.'));
        }
//        if (!isset($_POST['terms'])) {
//            $canBeAdded = false;
//            Model::setMessages(new ValueType('--error', 'You must confirm reading terms and conditions.'));
//        }
        if (sizeof($name) > 0) {
            $canBeAdded = false;
            Model::setMessages(new ValueType('--error', 'Name \'' . $_POST['name'] . '\' is already taken.'));
        }
        if (sizeof($email) > 0) {
            $canBeAdded = false;
            Model::setMessages(new ValueType('--error', 'Email \'' . $_POST['email'] . '\' is already taken.'));
        }
//        if ($_POST['password'] != $_POST['password-again']) {
//            $canBeAdded = false;
//            Model::setMessages(new ValueType('--error', 'Passwords don\'t match.'));
//        }
        if ($canBeAdded) {
            $this->dataAdd(DATA_USERS, 'user-');
        }
    }

//    TODO Delete
    protected function userGet()
    {
        foreach ($this->dataGet(DATA_USERS) as $keys) {
            foreach ($keys as $key => $value) {
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
}