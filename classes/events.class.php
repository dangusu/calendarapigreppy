<?php

class Events extends Db{
    
    private $table = 'events';
    public $id;
    public $userid;
    public $description;
    public $fromdate;
    public $todate;
    public $location;
    public $filter;
    public $sort;
    
    public function __construct()
    {
        $this->connect();
    }
            
    public function readEvent(){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);
        $row = $stmt->fetch();
        
        $this->description = $row['description'];
        $this->fromdate = $row['fromdate'];
        $this->todate = $row['todate'];
        $this->location = $row['location'];
    }
    
    public function createEvent(){
        $query = 'INSERT INTO ' . $this->table . ' SET id_user = ?, description = ?, location = ?, fromdate = ?, todate = ?';
        $stmt = $this->conn->prepare($query);
        
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->location = htmlspecialchars(strip_tags($this->location));        
        $this->fromdate = htmlspecialchars(strip_tags( $this->fromdate));        
        $this->todate = htmlspecialchars(strip_tags($this->todate));        
        
        if ($stmt->execute([$this->userid, $this->description, $this->location, $this->fromdate, $this->todate])) {
            return true;            
        }
        printf("Error: %s. \n", $stmt->error);
         
        return false;
    }
    
    public function updateEvent(){
        $query = 'UPDATE ' . $this->table . ' SET description = ?, location = ?, fromdate = ?, todate = ? WHERE id_user = ? AND id = ?';
        $stmt = $this->conn->prepare($query);
        
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->location = htmlspecialchars(strip_tags($this->location));        
        $this->fromdate = htmlspecialchars(strip_tags( $this->fromdate));        
        $this->todate = htmlspecialchars(strip_tags($this->todate));        
        
        if ($stmt->execute([$this->description, $this->location, $this->fromdate, $this->todate, $this->id, $this->userid])) {
            return true;            
        }
        printf("Error: %s. \n", $stmt->error);
         
        return false;
    }
    
    public function deleteEvent(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_user = ? AND id = ?';
        $stmt = $this->conn->prepare($query);
        
        if ($stmt->execute([$this->id, $this->userid])) {
            return true;            
        }
        printf("Error: %s. \n", $stmt->error);
         
        return false;
    }
    
    public function selectEvents(){
        
        $sort = (!empty($this->sort)) ? ' ORDER BY fromdate ASC' : '';
        $filter = (!empty($this->filter)) ? " WHERE fromdate LIKE  '" . $this->filter . "%'" : "";
        $what = (empty($filter) ? " WHERE " : " AND ");
        $eventsids = (!empty($this->eventsids)) ? $what . " id IN (" . $this->eventsids . ")" : "" ;
         
        $query = 'SELECT * FROM ' . $this->table . $filter . $eventsids . $sort;
        var_dump($query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);
        
        return $stmt;

    }

}