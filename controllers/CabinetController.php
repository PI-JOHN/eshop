<?php


class CabinetController
{
    public function actionIndex()
    {

        require_once __DIR__.'/../views/cabinet/index.php';
        return true;
    }
}