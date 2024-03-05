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

//insert student query into databasev
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

//         while($row = mysqli_fetch_array($res)){
//             $row = mysqli_fetch_array($res);
//         print_r($row);
//         echo "<br>";          
//    }

        return $res;

   }

   //delete student query from database
   public function deleteStudentData($id){
        $query="DELETE FROM $this->table_name WHERE id=$id";
        $res=mysqli_query($this->conn,$query);
        print_r($res);
        return $res;
   }

   //update student query from database
   public function updateStudentData($id,$name,$age,$course){
    $query="UPDATE $this->table_name SET name='$name',age='$age',course='$course' WHERE id=$id";
    $res=mysqli_query($this->conn,$query);
    return $res;
   }

}


?>





