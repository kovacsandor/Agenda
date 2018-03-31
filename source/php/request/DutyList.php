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
        $sliceLength = 10;
        $all = Helper::getData(DATA_DUTIES);
        $pageLast = intdiv(sizeof($all), $sliceLength) + 1;
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