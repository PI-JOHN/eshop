<?php


abstract class AdminBase
{
    /**
     * check access right
     * @return bool
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user['role'] == 'admin'){
            return true;
        }
        die ('Доступ закрыт');
    }
}