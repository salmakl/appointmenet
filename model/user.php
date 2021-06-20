<?php
class UserModel extends Connection{

    public function __construct(){
 
        parent::__construct();
    }
    public function check_User($reference){
 
        $sql = "SELECT * FROM user WHERE refrence = '$reference'";
        $query = $this->connection->query($sql);
 
        if($query->rowCount() > 0){
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            return $row[0];
        }
        else{
            return false;
        }
    }
    public function add($refrence,$fname,$lname,$age,$email,$pwd)
    {
        $sql="INSERT INTO `user`(`reference`, `fname`, `lname`, `age`, `email`, `phone`) VALUES  ('$refrence','$fname','$lname',''$age,'$email','$pwd')";
        $query = $this->connection->query($sql);
    }
}