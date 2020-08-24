<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "calendardb";
    protected $conn;
    
    protected function connect(){
        $this->conn = null;
        
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error:' . $e->getMessage();
        }
        
        return $this->conn;
    }
}