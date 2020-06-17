<?php


class User
{
    /**
     *  User registration
     * @param $userName
     * @param $userEmail
     * @param $userPassword
     * @return bool
     */
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

    /**
     * password validation check
     * @param $userPassword
     * @return bool
     */
    public static function checkPassword($userPassword)
    {
        if (strlen($userPassword) < 6){
            return false;
        } else {
            return true;
        }
    }

    /**
     * user validation check
     * @param $userName
     * @return bool
     */
    public static function checkUserName($userName)
    {
        if (strlen($userName) < 2){
            return false;
        } else {
            return true;
        }
    }

    /**
     * checking the existense of
     * an address in the database
     * @param $userEmail
     * @return bool
     */
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

    /**
     * email check validation
     * @param $userEmail
     * @return bool
     */
    public static function checkEmail($userEmail)
    {
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * exists is a user with
     * such data or not
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

    /**
     * remember user
     * @param $userId
     */
    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;
    }

    /**
     * user access check
     * @return mixed
     */
    public static function checkLogged()
    {

        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header ('Location: /user/login');
    }

    /**
     * is the user authorized?
     * @return bool
     */
    public static function isGuest()
    {

        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    /**
     * edit user data in the database
     * @param $userName
     * @param $userEmail
     * @param $userPassword
     * @param $userId
     * @return mixed
     */
    public static function edit($name,$password,$userId)
    {
        $db = Db::getConnectionMag();
        $sql = 'UPDATE user SET name = :name, password = :password WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':name',$name ,PDO::PARAM_STR);
        $result->bindParam(':password',$password ,PDO::PARAM_STR);
        $result->bindParam(':id',$userId ,PDO::PARAM_INT);

        return $result->execute();
  ;
    }

    /**
     * returns user by id
     * @param $userId
     * @return mixed
     */
    public static function getUserById($userId)
    {
        $db = Db::getConnectionMag();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function checkName($userName)
    {
        if (strlen($userName) < 2){
            return false;
        } return true;
    }

    public static function checkPhone($userPhone)
    {
        if (strlen($userPhone) < 7){
            return false;
        } return true;
    }


}