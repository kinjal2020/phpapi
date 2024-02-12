<?php

class Config{

    private $HOST="127.0.0.1";
    private $USERNAME="root";
    private $PASSWORD="";
    private $DBNAME="phpdemo";
    private $table_name="student";
    public $conn;


    public function __construct(){
        $this->conn=mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DBNAME);

        if($this->conn==true){
            echo "Connect";
        }
        else{
            echo "No connection";
        }

    }

//insert student query into database
    public function insertData($name,$age,$course){
         $query="INSERT INTO $this->table_name(name,age,course) VALUES('$name',$age,'$course')";
        $res = mysqli_query($this->conn,$query);

        if($res){
            echo "Success";
        }
        else{
            echo "Error";
        }
        return $res;
    }


   //display student query from database
   public function getStudentData(){
        $query = "SELECT * FROM $this->table_name";
        $res = mysqli_query($this->conn,$query);
        print_r($res);
   }


}


?>





