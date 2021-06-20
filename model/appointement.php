<?php

class ApointementModel extends Connection 
{
    public function __construct(){
 
        parent::__construct();
    }


    public function add($refrence,$date,$hour)
    {
        $sql="INSERT INTO `appointment`(`date`, `hour`, `reference`) VALUES ('$date','$hour','$reference')";
        $query = $this->connection->query($sql);
    }

    public function show($reference)
    {
        $sql="SELECT `id`, `date`, `hour` FROM `appointment` WHERE reference='$reference'";
        $query = $this->connection->query($sql);
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function delete($id)
    {
        $this->connection->$sql="DELETE FROM `appointment` WHERE id=$id";
    }
}