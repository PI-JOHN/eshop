<?php


class User
{
    public static function register($userName, $userEmail,$userPassword)
    {

                $db = Db::getConnectionMag();
                $sql = 'INSERT INTO user (name , email, password) VALUES (:userName, :userEmail, :userPassword)';
                $result = $db->prepare($sql);
                $result->bindParam(':userName', $userName, PDO::PARAM_STR);
                $result->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
                $result->bindParam(':userPassword', $userPassword, PDO::PARAM_STR);
                return $result->execute();

    }

    public static function checkPassword($userPassword)
    {
        if (strlen($userPassword) < 6){
            return false;
        } else {
            return true;
        }
    }

    public static function checkUserName($userName)
    {
        if (strlen($userName) < 2){
            return false;
        } else {
            return true;
        }
    }

    public static function checkEmailExists($userEmail)
    {
        $db = Db::getConnectionMag();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $userEmail,PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;

            return false;



    }

    public static function checkEmail($userEmail)
    {
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUserData($email,$password)
    {
        $db = Db::getConnectionMag();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user){
            return $user['id'];
        }
        return false;

    }

    /** Запоминаем пользователя
     * @param $userId
     */
    public static function auth($userId)
    {
        session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        session_start();
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header ('Location: /user/login');
    }
}