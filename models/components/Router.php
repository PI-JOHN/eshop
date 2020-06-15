<?php



class Router
{
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $routesPath = __DIR__.'/../../controllers/config/routes.php';
        $this->routes = include($routesPath);

    }

    /**
     * @return string
     */
    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
             return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     *
     */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getUri();

        //Проверяем наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path){

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)){
                // Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер , action , и параметры
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments)). 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));;
                $parameters = $segments;

                // Подключить файл класса контроллера
                $controllerFile = __DIR__.'/../../controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)){
                    require_once ($controllerFile);
                }

                // Создаем обьект и вызываем метод т.е. action
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null){
                    break;
                }
            }
        }
    }
}