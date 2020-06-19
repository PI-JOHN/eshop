<?php
/**
 *
 * Class AdminController
 * Главная страница в админпанели
 */

class AdminController extends AdminBase
{
    /**
     * экшен для стартовой страницы Панели Администратора
     * @return bool
     */
    public function actionIndex()
    {
        //Проверка доступа
        self::checkAdmin();

        require_once __DIR__.'/../views/admin/index.php';
        return true;
    }
}