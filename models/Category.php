<?php


class Category
{
    /**
     * @return array
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnectionMag();
        $sql = 'SELECT id, name FROM category ORDER BY sort_order DESC';
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


}