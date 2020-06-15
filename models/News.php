<?php
include_once __DIR__.'/components/Db.php';

class News
{
    /**
     * @return array
     */

    public static function getNewsList()
    {

        $sql = 'SELECT * FROM news ORDER BY date DESC LIMIT 3';
        $newsList = News::listNewsQuery($sql, $item);
        return $newsList;


    }

//    public static function getLastArticle()
//    {
//        $db = Db::getConnection();
//        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 1';
//        $result = $db->query($sql);
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//        $lastArticle = $result->fetch();
//        return $lastArticle;
//    }

    public static function getLastArticle()
    {

        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 1';
        $lastArticle=News::singleItemQuery($sql,$item);
        return $lastArticle;

    }

    /**
     * Метод для получения данных об одной новости
     * @param $sql запрос к базе
     * @param $item получаемый массив данных одной новости
     * @return mixed
     */
    public static function singleItemQuery($sql,$item)
    {
        $db = Db::getConnectionNews();
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $item = $result->fetch();
        return $item;
    }

    /**
     * Метод для получения списка данных из БД
     * @param $sql
     * @param $item
     * @return array
     */
    public static function listNewsQuery($sql,$item)
    {
        $db = Db::getConnectionNews();
        $result = $db->query($sql);
        $item = array();
        $i=0;
        while($row = $result->fetch()){
            $item[$i]['id'] = $row['id'];
            $item[$i]['title'] = $row['title'];
            $item[$i]['short_content'] = $row['short_content'];
            $item[$i]['author_name'] = $row['author_name'];
            $item[$i]['date'] = $row['date'];
            $item[$i]['content'] = $row['content'];
            $i++;
        }
        return $item;
    }

    public static function getPreLastArticle()
    {

        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 1,1';
        $preLastArticle = News::singleItemQuery($sql, $item);
        return $preLastArticle;
    }

//    public static function getOldNews()
//    {
//        $db = Db::getConnection();
//        $sql = 'SELECT * FROM news ORDER BY date ASC LIMIT 3';
//        $result = $db->query($sql);
//        $oldNews = array();
//        $i = 0;
//        while($row = $result->fetch()){
//           $oldNews[$i]['id'] = $row['id'];
//           $oldNews[$i]['title'] = $row['title'];
//           $oldNews[$i]['short_content'] = $row['short_content'];
//           $oldNews[$i]['author_name'] = $row['author_name'];
//           $oldNews[$i]['date'] = $row['date'];
//           $oldNews[$i]['content'] = $row['content'];
//           $i++;
//        }
//        return $oldNews;
//    }

    public static function getOldNews()
    {

        $sql = 'SELECT * FROM news ORDER BY date ASC LIMIT 3';

        $oldNews = News::listNewsQuery($sql, $item);
        return $oldNews;
        $i = 0;

    }



    /**
     * @param $id
     * @return mixed
     */
    public static function getNewsItemById($id)
    {   $id = intval($id);
        if ($id){

            $sql = 'SELECT * FROM news WHERE id='.$id;

            $newsItem = News::singleItemQuery($sql, $item);
            return $newsItem;
        }

    }

    public static function getNewsListMinusThree()
    {


        $sql = 'SELECT * FROM news ORDER BY date DESC LIMIT 3,3';
        $middleNews = News::listNewsQuery($sql, $item);

        return $middleNews;
    }
}