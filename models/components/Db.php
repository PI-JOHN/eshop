<?php





class Db
{

    public static function getConnectionNews()
    {
        $params = (include __DIR__.'/../../Controllers/config/db_params.php')['news'];

        try{
            $dsn = 'mysql:host=' . $params['host'] . '; dbname=' . $params['dbname'];'charset=utf8mb4';
            $db = new \PDO($dsn, $params['user'], $params['password']);
            return $db;
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }

    public static function getConnectionMag()
    {
        $params = (include __DIR__.'/../../Controllers/config/db_params.php')['super_mag'];

        try{
            $dsn = 'mysql:host=' . $params['host'] . '; dbname=' . $params['dbname'];'charset=utf8mb4';
            $db = new \PDO($dsn, $params['user'], $params['password']);
            return $db;
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }
}