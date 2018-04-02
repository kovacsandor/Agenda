<?php

class DutyRequest extends Request
{
    public function __construct()
    {
        parent::__construct();
        $this->action();
    }

    protected function action()
    {
        if (!Helper::isUserLoggedIn()) {
            Model::setMessages(new ValueType(TYPE_MESSAGE_WARNING, 'You must log in before continuing.'));
            new Redirect(PAGE_LOGIN);
        }
        if (isset($_POST[KEY_LIST_DUTY_REMOVE])) {
            $this->remove();
        } elseif (isset($_POST[KEY_LIST_DUTY_SET_DONE])) {
            $this->setDone();
        } elseif (isset($_POST[KEY_LIST_DUTY_SET_UNDONE])) {
            $this->setUndone();
        } else {
            $this->add();
        }
        new Redirect(PAGE_DUTY_LIST);
    }

    private function remove()
    {
        foreach (file(DATA_DUTIES) as $line) {
            $duty = unserialize($line);
            if (json_decode($duty[KEY_ID]) == $_POST[KEY_ID]) {
                file_put_contents(DATA_DUTIES, str_replace($line, '', file_get_contents(DATA_DUTIES)));
                break;
            }
        }
    }

    private function setDone()
    {
        foreach (file(DATA_DUTIES) as $line) {
            $duty = unserialize($line);
            if (json_decode($duty[KEY_ID]) == $_POST[KEY_ID]) {
                $duty[KEY_DUTY_IS_DONE] = json_encode(VALUE_CHECKBOX_TRUE);
                $newLine = serialize($duty) . PHP_EOL;
                file_put_contents(DATA_DUTIES, str_replace($line, $newLine, file_get_contents(DATA_DUTIES)));
                break;
            }
        }
    }

    private function setUndone()
    {
        foreach (file(DATA_DUTIES) as $line) {
            $duty = unserialize($line);
            if (json_decode($duty[KEY_ID]) == $_POST[KEY_ID]) {
                $duty[KEY_DUTY_IS_DONE] = json_encode('');
                $newLine = serialize($duty) . PHP_EOL;
                file_put_contents(DATA_DUTIES, str_replace($line, $newLine, file_get_contents(DATA_DUTIES)));
                break;
            }
        }
    }

    private function add()
    {
        $canBeAdded = true;
        $title = $_POST[KEY_DUTY_TITLE];

        if (empty($title)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Title\' is required.'));
        }
        if ($canBeAdded) {
            $_POST[KEY_DUTY_BODY] = isset($_POST[KEY_DUTY_BODY]) ? $_POST[KEY_DUTY_BODY] : ``;
            $_POST[KEY_DUTY_IS_DONE] = isset($_POST[KEY_DUTY_IS_DONE]) ? $_POST[KEY_DUTY_IS_DONE] : ``;
            $_POST[KEY_DUTY_TIME] = time();
            $_POST[KEY_DUTY_USER] = $_SESSION[SESSION_USER_NAME];
            $message = 'Success, added duty \'' . $title . '\' to database.';
            $this->dataAdd(DATA_DUTIES, 'duty-', $message);
        }
    }
}