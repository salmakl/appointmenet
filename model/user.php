<?php
require_once "Connection.php";
class UserModel extends Connection{

    public function __construct(){
 
        parent::__construct();
    }
    public function check_User($reference){
 
        $sql = "SELECT * FROM user WHERE reference = '$reference'";
        $query = $this->connection->query($sql);
 
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row["reference"];
        }
        else{
            return false;
        }
    }
    public function add($refrence,$fname,$lname,$age,$email,$phone)
    {
        $sql="INSERT INTO `user`(`reference`, `fname`, `lname`, `age`, `email`, `phone`) VALUES  ('$refrence','$fname','$lname',$age,'$email','$phone')";
        $query = $this->connection->query($sql);
        return $query;
    }
}