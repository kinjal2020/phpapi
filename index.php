<?php 



include("config/config.php");
$config= new Config();


$submit_btn= @$_REQUEST['submit'];

if(isset($submit_btn)){
    // echo $_GET['name'];

$name=$_POST['name'];
$age=$_POST['age'];
$course=$_POST['course'];

echo $name;
echo $age;
echo $course;

$res= $config -> insertData($name,$age,$course);

if($res==1){
    header("Location:dashboard.php");
}

}

$config->getStudentData();

?>


<!DOCTYPE html>
<html>
<head>
<title> PHP Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<div class="container pt-5" >


<form action="",method="post">
  <div class="mb-3">
    <label for="nameField" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="nameField" name="name">

  </div>
  <div class="mb-3">
    <label for="numberField" class="form-label">Student Age</label>
    <input type="number" class="form-control" id="numberField" name="age">
  </div>
  <div class="mb-3">
    <label for="courseField" class="form-label">Student Course</label>
    <input type="text" class="form-control" id="courseField" name="course">

  </div>
  <input type="submit" class="btn btn-primary" name="submit"></input>
</form>

  

<!-- <form action="",method="get">

Name : <input type="text" name="name"> <br> <br> 
Age : <input type="number" name="age"><br> <br>
Course : <input type="text" name="course"><br> <br>

<input type="submit" value="SUBMIT" name="submit">
 
</form> -->
</div>



</body>
</html>
