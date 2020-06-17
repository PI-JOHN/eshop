<?php


class CartController
{
    public function actionAdd($id)
    {
        //var_dump($_SESSION['products']); die;
        // Add product to cart
        Cart::addProduct($id);

        // return user back to page
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once __DIR__.'/../views/cart/index.php';
        return true;
    }

    public function actionCheckout()
    {
        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();

        // Статус успешного оформления заказа
        $result = false;

        // Форма отправлена?
        if (isset($_POST['submit'])) {
            // Форма отправлена? - Да
            // Считываем данные формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];


            // Валидация полей
            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя ';
            }

            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }

            // Форма заполнена корректно?
            if ($errors == false) {

                // Форма заполнена корректно? - Да
                // Сохраняем заказ в базе данных
                // Собираем информацию о заказе
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }
                // Сохраняем заказ в БД
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    // Оповещаем администратора о новом заказе
                    $adminEmail = 'popo@mail.ru';
                    $message = 'http//:pr-shop.ru/admin/orders';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $subject, $message);
                    // Очищаем корзину
                    Cart::clear();
                }

            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $countItems = Cart::countItems();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
            }
        } else {
            // Форма отправлена? - Нет
            // Получием данные из корзины
            $productsInCart = Cart::getProducts();
            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                header('Location: /');
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров
                $countItems = Cart::countItems();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);

                $userName = false;
                $userPhone = false;
                $userComment = false;

                // Пользователь авторизирован?
                if (User::isGuest()) {
                    // Нет
                    // Значения для формы пустые
                } else {
                    // Да, авторизирован
                    // Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogged();
                    // Подставляем в форму
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }
        }
                require_once __DIR__.'/../views/cart/checkout.php';
                return true;

    }

    public function actionDelete($id)
    {
        Cart::deleteFromCart($id);
        header('Location: /cart/');
    }






}