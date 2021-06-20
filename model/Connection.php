<?php
class Connection{
 
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'appointement';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->username,$this->password);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->connection;
    }
}
?>