<?php
require_once "Connection.php";

class AppointementModel extends Connection 
{
    public function __construct(){
 
        parent::__construct();
    }


    public function add($reference,$date,$hour,$message)
    {
        
            $sql="INSERT INTO `appointment`(`date`, `hour`,`message`, `reference`) VALUES ('$date','$hour','$message','$reference')";
            $query = $this->connection->query($sql);
            return $query;
      
      
    }

    public function show($reference)
    {
        $sql="SELECT * FROM `appointment` WHERE reference='$reference'";
        $query = $this->connection->query($sql);
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function delete($id)
    {
        $query= $this->connection->query("DELETE FROM `appointment` WHERE id=$id");
         if($query){
            return true;
         }
         return false;

    }
    public function readSingle($id)
    {
        $sql="SELECT * FROM `appointment` WHERE id=$id";
        $query = $this->connection->query($sql);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function checkifExists($date,$hour)
    {
        $sql="SELECT *  FROM `appointment` WHERE hour='$hour' AND date='$date'";
        $query = $this->connection->query($sql);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function update($id, $date, $hour, $message)
    {
        $PreRow=$this->readSingle($id);
        if(!is_array($PreRow)):
        return ["Message" => "ID reservation not valid!"];
        else:

            // check if slot is reserved
            
                if(!$this->checkifExists($date,$hour) && !($PreRow["date"] == $date && $PreRow["hour"] == $hour) ):
                
                $sql = "UPDATE `appointment` SET date='$date',hour='$hour',message='$message' WHERE id=$id";
                $query = $this->connection->query($sql);
                    
                return ["Message" => "Reservation updated Succesfuly!"];
                else:
                return ["Message" => "Reservation Already Exist on the same time!"];
                endif;
        endif;
      
        
    }
}