<?php


class UserController
{
    public function actionRegister()
    {
        $userName = '';
        $userEmail = '';
        $userPassword = '';
        $result = false;

        if (isset($_POST['submit'])){
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];


            $errors = false;

            if(!User::checkPassword($userPassword)){
                $errors[] = 'Пароль должен состоять минимум из 6ти символов';
            }

            if(!User::checkUserName($userName)){
                $errors[] = 'Имя должно быть не короче 2х символов';
            }

            if(User::checkEmailExists($userEmail)){
                $errors[] = 'Пользователь с таким Email уже зарегистрирован';
            }

            if (!User::checkEmail($userEmail)){
                $errors[] = 'Введите корректный Email адрес';
            }
            if ($errors == false){
                $result = User::register($userName, $userEmail,$userPassword);
            }
        }

        require_once __DIR__.'/../views/user/register.php';
        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';
        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = false;

            if (!User::checkEmail($email)){
                $errors[] = 'Введите корректный email';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6ти символов';
            }

            //проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false){
                $errors[] = 'Неправильные данные входа на сайт';
            } else {
                User::auth($userId);

                header('Location: /cabinet/');
            }
        }

        require_once __DIR__.'/../views/user/login.php';
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /');

    }


}