<?php

class Users extends Db{
    
    private $table = 'users';
    public $email;
    public $pass;
    
    public function __construct()
    {
        $this->connect();
    }
    
    public function readAll(){
        $query = 'SELECT t.email FROM ' . $this->table;
    }
    
    public function createUser(){
        $query = 'INSERT INTO ' . $this->table . ' SET email = ?, password = ?';
        $stmt = $this->conn->prepare($query);
        
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->pass = htmlspecialchars(strip_tags($this->pass));
        
        if ($stmt->execute([$this->email,$this->pass])) {
            return true;            
        }
        printf("Error: %s. \n", $stmt->error);
         
        return false;
    }
    
        public function authUser($email, $password){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = ? AND password = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email,$password]);
        
        $res = $stmt->fetch(PDO::FETCH_NUM);
        
        if ($res = 1) return true;       
         
        return false;
    }
}