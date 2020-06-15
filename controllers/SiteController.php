<?php

require_once __DIR__.'/../Models/Category.php';
require_once __DIR__.'/../models/Product.php';


class SiteController
{
    public function actionIndex()
    {
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        $categoriesList = array();
        $categoriesList = Category::getCategoriesList();
        include_once __DIR__.'/../views/site/index.php';
        return true;
    }
}