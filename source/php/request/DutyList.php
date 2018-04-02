<?php

class DutyList extends Request
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
        $sliceLength = 10;
        $all = array_filter(Helper::getData(DATA_DUTIES), [new Callback(KEY_DUTY_USER), CALLBACK_FILTER_SESSION]);
        $pageLast = intdiv(sizeof($all) - 1, $sliceLength) + 1;
        $page = isset($_GET[GET_PAGE]) && $_GET[GET_PAGE] > 0 ? $_GET[GET_PAGE] : 1;
        $offset = $page > $pageLast ? ($pageLast - 1) * $sliceLength : ($page - 1) * $sliceLength;
        $duties = array_slice($all, $offset, $sliceLength);
        Model::setDuties($duties);
        Model::setPagingInformation([
            KEY_PAGE_INFO_CURRENT_PAGE => $offset / $sliceLength + 1,
            KEY_PAGE_INFO_DUTY_COUNT => sizeof($all),
            KEY_PAGE_INFO_DUTY_FROM => $offset + 1,
            KEY_PAGE_INFO_DUTY_TO => $offset + sizeof($duties),
            KEY_PAGE_INFO_LAST => $pageLast,
        ]);
    }
}