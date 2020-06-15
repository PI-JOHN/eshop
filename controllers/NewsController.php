<?php
include_once __DIR__.'/../models/News.php';

class NewsController
{
    /**
     * @return bool
     */
    public function actionIndex()
    {

        $newsList = News::getNewsList();
        $lastArticle = News::getLastArticle();

        $preLastArticle = News::getPreLastArticle();
        $oldNews = News::getOldNews();
        $middleNews = News::getNewsListMinusThree();


        include_once __DIR__.'/../views/news/index.php';
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
       $newsItem = News::getNewsItemById($id);

        include_once __DIR__.'/../views/news/view.php';
        return true;
    }
}