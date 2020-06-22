<?php


class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        //var_dump($user['password']);
        require_once __DIR__.'/../views/cabinet/index.php';
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])){

            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = false;

            if(!User::checkPassword($password)){
                $errors[] = 'Пароль должен состоять минимум из 6ти символов';
            }

            if(!User::checkUserName($name)){
                $errors[] = 'Имя должно быть не короче 2х символов';
            }


            if ($errors == false){
                $result = User::edit($name, $password,$userId);
            }

        }

        require_once __DIR__ . '/../views/cabinet/edit.php';
        return true;
    }
}