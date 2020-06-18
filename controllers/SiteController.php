<?php

require_once __DIR__.'/../Models/Category.php';
require_once __DIR__.'/../models/Product.php';


class SiteController
{
    public function actionIndex()
    {
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        $recommended = array();
        $recommended = Product::isRecommended();
        //var_dump($recommended);

        $categoriesList = array();
        $categoriesList = Category::getCategoriesList();
        include_once __DIR__.'/../views/site/index.php';
        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if(isset($_POST['submit'])){
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $errors = false;

            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный Email';
            }

            if ($errors == false){
                $adminEmail = 'test@test.ru';
                $subject = 'Тема письма';
                $message = "Текст: {$userText}. От: {$userEmail}";
                $result = mail($adminEmail, $subject,$message);
                $result = true;
            }
        }

        require_once __DIR__.'/../views/site/contact.php';
        return true;
    }
}