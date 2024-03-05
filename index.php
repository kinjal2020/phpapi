<?php 



include("config/config.php");
$config= new Config();


$submit_btn= @$_REQUEST['submit'];

$res=-1;

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
    // header("Location:dashboard.php");
}

}


$delete_btn=@$_REQUEST['btnDelete'];



if(isset($delete_btn)){
    echo "Delete button pressed".$delete_btn;
$id=$_POST['deleteId'];
print($id);
$delte_res=$config -> deleteStudentData($id);

if($delte_res){
   echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   <strong>Hurrayyy !</strong> Record deleted successfully...
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";
}
else{
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Failed !</strong> failed to delete...
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label=Close></button> </div>";       
}
}

$update_btn=@$_REQUEST['btnUpdate'];


$updateres=-1;

if(isset($update_btn)){
    $updateName=$_POST['updateName'];
    $updateAge=$_POST['updateAge'];
    $updateCourse=$_POST['updateCourse'];
    $updateId=$_POST['updateId'];
    
}

$update=@$_REQUEST['update'];
    if(isset($update)){
        $name=$_POST['name'];
        $age=$_POST['age'];
        $course=$_POST['course'];
        $updateId=$_POST['id'];

        echo $updateId;
        $updateres = $config -> updateStudentData($updateId,$name,$age,$course);

    }


$response= $config->getStudentData();

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


<?php if($res == 1) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hurrayyy !</strong> Record inserted successfully...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } else if($res == 0) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alas !</strong> Record insertion failed...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>

            <?php if($updateres == 1) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hurrayyy !</strong> Record updated successfully...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } else if($updateres == 0) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alas !</strong> Record updated failed...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>          

            <form method="post">
                <input type="hidden" name="id" value="<?php
                    if($update_btn != null) {
                        echo $updateId;
                    }
                ?>"> 

    <form method="post">
    <div class="mb-3">
        <label for="nameField" class="form-label">Student Name</label>
        <input type="text" class="form-control" id="nameField" name="name" value="<?php 
        if($update_btn!=null){
            echo "$updateName";
        }?>">

    </div>
    <div class="mb-3">
        <label for="numberField" class="form-label">Student Age</label>
        <input type="number" class="form-control" id="numberField" name="age" value="<?php 
        if($update_btn!=null){
            echo "$updateAge";
        }?>">

    </div>
        <div class="mb-3">
        <label for="courseField" class="form-label">Student Course</label>
        <input type="text" class="form-control" id="courseField" name="course"value="<?php 
        if($update_btn!=null){
            echo "$updateCourse";
        }?>">

    </div>
    <input type="submit" class="btn btn-primary" name="<?php echo$update_btn!=null ? "update" :"submit"?>" 
    value="<?php echo$update_btn!=null ? "Update" :"Submit";?>"></input>
    </form>
                              

    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Student Name</th>
        <th scope="col">Student Age</th>
        <th scope="col">Student Course</th>
        <th scope="col" >Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
            <?php 
            while ($row = mysqli_fetch_array($response)) {  ?>
                <tr>
                <th scope="row"><?php echo $row['id'];?></th>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['age'];?></td>
                <td><?php echo $row['course'];?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $row['id'];?>" name="updateId">
                        <input type="hidden" value="<?php echo $row['name'];?>" name="updateName">
                        <input type="hidden" value="<?php echo $row['age'];?>" name="updateAge">
                        <input type="hidden" value="<?php echo $row['course'];?>" name="updateCourse">
                    <input type="submit" value="Update" class="btn btn-primary" name="btnUpdate">
                    </form>
                </td>
                <td>
                <form method="post">
                        <input type="hidden" value="<?php echo $row['id'];?>" name="deleteId">
                        <input type="submit" value="Delete" class="btn btn-danger" name="btnDelete">
                    <!-- <a href="phpdemo/<?php echo $row['id'];?>">Del Data</a> -->
                    </td>
            </form>
                </tr>
                <tr>
            <?php  } ?>
    </tbody>
    </table>

  

<!-- <form action="",method="get">

Name : <input type="text" name="name"> <br> <br> 
Age : <input type="number" name="age"><br> <br>
Course : <input type="text" name="course"><br> <br>

<input type="submit" value="SUBMIT" name="submit">
 
</form> -->


</div>



</body>
</html>
