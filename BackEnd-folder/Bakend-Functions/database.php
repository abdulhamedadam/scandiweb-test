<?php


require_once 'config.php';

class Database
{
    private $connection;

    function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $this->connection->set_charset('utf8mb4');
        } catch (mysqli_sql_exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function get()
    {
        return $this->connection;
    }
}
