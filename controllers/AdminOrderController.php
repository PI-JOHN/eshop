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
    $productQuantity = json_decode($order['products'], true);
    $ids = array_keys($productQuantity);

    $products = Product::getProductsByIds($ids);

    require_once __DIR__.'/../views/admin-order/view.php';
    return true;
  }


  public function actionUpdate($id)
  {
    self::checkAdmin();

    $order = Order::getOrderById($id);

    if (isset($_POST['submit'])){
      $userName = $_POST['userName'];
      $userPhone = $_POST['userPhone'];
      $userComment = $_POST['userComment'];
      $date = $_POST['date'];
      $status = $_POST['status'];

      Order::updateOrderById($id , $userName, $userPhone, $userComment, $date, $status);

      header('Location: /admin/order');
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
