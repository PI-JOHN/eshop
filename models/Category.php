<?php


class Category
{
    /**
     * @return array
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnectionMag();
        $sql = "SELECT id, name FROM category WHERE status='1' ORDER BY sort_order ASC";
        $result = $db->query($sql);
        $categoriesList = array();
        $i = 0;
        while($row = $result->fetch()){
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoriesList;
    }

/**
* @return array values for categoriesListAdmin
*
*/
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnectionMag();
        $sql = "SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC";
        $result = $db->query($sql);
        $categoriesList = array();
        $i = 0;
        while($row = $result->fetch()){
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $categoriesList[$i]['sort_order'] = $row['sort_order'];
            $categoriesList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoriesList;
    }

}
