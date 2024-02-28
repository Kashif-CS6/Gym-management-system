<?php include 'partials/_dbconnect.php'?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from `users` where `sno`='$id'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    else{
        header('location:welcomadmin.php?delete_msg=You have deleted the record.');
    }
}
?>