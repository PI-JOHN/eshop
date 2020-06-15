<?php

require_once __DIR__.'/../Models/Category.php';
require_once __DIR__.'/../models/Product.php';

class ProductController
{
    public function actionView($id)
    {
        $categoriesList = array();
        $categoriesList = Category::getCategoriesList();



        $product = Product::getProductById($id);
        include_once __DIR__.'/../views/product/view.php';
        return true;
    }
}