<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct($config)
    {
        $dsn = "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $this->pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], $options);
    }

    public static function getInstance($config = null)
    {
        if (self::$instance === null) {
            if ($config === null) {
                throw new Exception('Database config required');
            }
            self::$instance = new Database($config);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
