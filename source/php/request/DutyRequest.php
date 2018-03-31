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
        $canBeAdded = true;
        $title = $_POST[KEY_DUTY_TITLE];

        if (empty($title)) {
            $canBeAdded = false;
            Model::setMessages(new ValueType(TYPE_MESSAGE_ERROR, 'Field \'Title\' is required.'));
        }
        if ($canBeAdded) {
            $_POST[KEY_DUTY_BODY] = isset($_POST[KEY_DUTY_BODY]) ? $_POST[KEY_DUTY_BODY] : ``;
            $_POST[KEY_DUTY_IS_DONE] = isset($_POST[KEY_DUTY_IS_DONE]) ? $_POST[KEY_DUTY_IS_DONE] : ``;
            $_POST['time'] = time();
            $_POST['user'] = $_SESSION[SESSION_USER_NAME];
            $message = 'Success, added duty \'' . $title . '\' to database.';
            $this->dataAdd(DATA_DUTIES, 'duty-', $message);
            new Redirect(PAGE_DUTIES);
        }
    }
}