<?php



class CatalogController
{
    public function actionIndex()
    {
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        $categoriesList = array();
        $categoriesList = Category::getCategoriesList();
        include_once __DIR__.'/../views/site/index.php';
        return true;
    }

    public function actionCategory($categoryId , $page = 1)
    {
        $categoriesList = array();
        $categoriesList = Category::getCategoriesList();

        $productListByCategory = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем обьект класса Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        //var_dump($pagination);
        include_once __DIR__.'/../views/catalog/category.php';
        return true;
    }
}