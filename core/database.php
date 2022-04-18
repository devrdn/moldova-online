<?php
class DataBase {
    private $host;
    private $user;
    private $password;
    private $database;
    private $pdo;

    public function __construct()
    {  
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "culture_moldova"; 
    }

    public function init() {
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
        } catch (Exception $e) {
            echo "DB Error: " . $e->getMessage();
        }
    }
        
    public function disconnect() {
        $this->pdo = null;
    }
}