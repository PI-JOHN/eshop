<?php


class Product
{
    const SHOW_BY_DEFAULT = 3;
    /**
     * @return array
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnectionMag();
        $sql = 'SELECT id, name,  price,  is_new,  image FROM product WHERE status="1" ORDER BY id DESC LIMIT '. $count . ' OFFSET ' . $offset;
        $result = $db->query($sql);
        $productsList = array();
        $i = 0;
        while($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];

            $i++;
        }
        return $productsList;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId){

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnectionMag();
        $sql = 'SELECT * FROM product WHERE category_id=' . $categoryId .' AND status=1 ORDER BY id ASC LIMIT ' .self::SHOW_BY_DEFAULT .'  OFFSET  ' . $offset;
        $result = $db->query($sql);
        $products = array();
        $i = 0;
        while($row = $result->fetch()){
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['category_id'] = $row['category_id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['availability'] = $row['availability'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['description'] = $row['description'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_recommended'] = $row['is_recommended'];
            $products[$i]['status'] = $row['status'];
            $i++;
        }
        return $products;
        }

    }

    public static function getProductById($id)
    {
        $id = intval($id);
        $db = Db::getConnectionMag();
        $sql = 'SELECT * FROM product WHERE id =' . $id;
        $result = $db->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $categoryId = intval($categoryId);
        $db = Db::getConnectionMag();
        $result = $db->query('SELECT count(id) AS count FROM product WHERE status="1" AND category_id='. $categoryId);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
}