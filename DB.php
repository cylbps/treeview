<?php

include_once 'config.php';
class DB {
    
    protected $connection;
    private static $instance;

    private function __construct() {
        $this->connection = new mysqli(HOST, USER, PASSWORD, DB);
        if ($this->connection->connect_errno) {
            exit('Не удальсь установить соединение с базой данных.');
        }
    }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
}
