<?php

class AdminOrderController extends AdminBase
{
  public function actionIndex()
  {
    self::checkAdmin();

    $orders = Order::getOrders();

    require_once __DIR__.'/../views/admin-order/index.php';
    return true;
  }


  public function actionView($id)
  {
    self::checkAdmin();

    $order = Order::getOrderById($id);

    require_once __DIR__.'/../views/admin-order/view.php';
    return true;
  }


  public function actionUpdate($id)
  {
    self::checkAdmin();

    $order = Order::getOrderById($id);

    if (isset($_POST['submit'])){
      $userName = $_POST['user_name'];
      $userPhone = $_POST['user_phone'];
      $userComment = $_POST['user_comment'];
      $userProducts = $_POST['user_products'];
      $status = $_POST['status'];

      Order::updateOrderById($id , $userName, $userPhone, $userComment, $userProducts, $status);

      header('Location: /admin/order')
    }
    require_once __DIR__.'/../views/admin-order/update.php';
    return true;
  }


  public function actionDelete($id)
  {
    self::checkAdmin();

    if (isset($_POST['submit'])){
      Order::deleteOrderById($id);
      header('Location: /admin/order');
    }
    require_once __DIR__.'/../views/admin-order/delete.php';
    return true;
  }
}
 ?>
