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

    public static function getCategoryById($id)
    {
      $db = Db::getConnectionMag();
      $sql = 'SELECT name, sort_order, status FROM category WHERE id = :id';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $result->execute();
      return $result->fetch();
    }

    /**
    * create new category into database
    */
    public static function createCategory($name, $sortOrder, $status)
    {

      $db = Db::getConnectionMag();
      $sql = 'INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)';
      $result = $db->prepare($sql);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
      $result->bindParam(':status', $status, PDO::PARAM_INT);
      return $result->execute();
    }

     public static function updateCategoryById($id, $name, $sortOrder, $status)
     {
       $db = Db::getConnectionMag();
       $sql = 'UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id';
       $result = $db->prepare($sql);
       $result->bindParam(':id', $id, PDO::PARAM_INT);
       $result->bindParam(':name', $name, PDO::PARAM_STR);
       $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
       $result->bindParam(':status', $status, PDO::PARAM_INT);
       return $result->execute();
     }

     public static function deleteCategoryById($id)
     {
       $db = Db::getConnectionMag();
       $sql = 'DELETE FROM category WHERE id = :id';
       $result = $db->prepare($sql);
       $result->bindParam(':id', $id, PDO::PARAM_INT);
       return $result->execute();
     }

}
