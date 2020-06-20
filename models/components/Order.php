<?php


class Order
{
    /** save order to database
     * @param $userName
     * @param $userPhone
     * @param $userComment
     * @param $userId
     * @param $productsInCart
     * @return bool
     */
    public static function save($userName, $userPhone, $userComment, $userId, $productsInCart)
    {
        $db = Db::getConnectionMag();
        $productsInCart = json_encode($productsInCart);
        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products)
VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $productsInCart, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function getOrderById($id)
    {
      $db = Db::getConnectionMag();
      $sql = 'SELECT * FROM product_order WHERE id = :id';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $result->execute();
      return $result->fetch();
    }


    public static function getOrders()
    {
      $db = Db::getConnectionMag();
      $sql = 'SELECT * FROM product_order ORDER BY id ASC';
      $result = $db->query($sql);
      $orders = array();
      $i = 0;
      while($row = $result->fetch()){
        $orders[$i]['user_name'] = $row['user_name'];
        $orders[$i]['date'] = $row['date'];
        $orders[$i]['id'] = $row['id'];
        $orders[$i]['user_phone'] = $row['user_phone'];
        $orders[$i]['user_comment'] = $row['user_comment'];
        $orders[$i]['user_id'] = $row['user_id'];
        $orders[$i]['products'] = $row['products'];
        $orders[$i]['status'] = $row['status'];
        $i++;
      }
      return $orders;
    }


    public static function updateOrderById($id , $userName, $userPhone, $userComment, $userProducts, $status)
    {
      $db = Db::getConnectionMag();
      $sql = 'UPDATE product_order SET user_name = :user_name, user_phone = :user_phone,
      user_comment = :user_comment, products = :products, status = :status WHERE id = :id';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
      $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
      $result->bindParam(':user_comment', $userComment, PDO::PARAM_INT);
      $result->bindParam(':products', $userProducts, PDO::PARAM_INT);
      $result->bindParam(':status', $status, PDO::PARAM_INT);
      return $result->execute();
    }


    public static function actionDelete($id)
    {
      $db = Db::getConnectionMag();
      $sql = 'DELETE FROM product_order WHERE id = :id';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    }


    public static function getStatusText($status)
    {
      switch($status){
        case '1' : return 'Новый заказ'; break;
        case '2' : return 'В обработке'; break;
        case '3' : return 'Доставляется'; break;
        case '4' : return 'Заказ закрыт'; break;
      }
    }


    public static function deleteOrderById($id)
    {
      $db = Db::getConnectionMag();
      $sql = 'DELETE FROM product_order WHERE id = :id';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    }
}
