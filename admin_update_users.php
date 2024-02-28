<?php include 'partials/_dbconnect.php'?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php echo $_SESSION['namename'] ?></title>
  </head>
  <style>
  </style>
  <body>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

$query="select * from `users` where `sno`='$id'";
    $result=mysqli_query($conn,$query);
    if (!$result){
        die("query Failed".mysqli_error());
         }
        else{
            $row=mysqli_fetch_assoc($result);
}
}
?>
<?php
if(isset($_POST['update_students'])){
    if(isset($_GET['id_new'])){
        $idnew=$_GET['id_new'];
    }
    $idd=$_POST['id'];
    $username=$_POST['uname'];
    $my_password=$_POST['password'];
    $query="update `users` set `sno`='$idd',`username`='$username',`password`='$my_password' where `sno`='$idnew'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    else{
        header('location:welcomadmin.php?update_msg=You have Successfully updated the data');
    }
}
?>
<div class="container my-3">
<form action="admin_update_users.php?id_new=<?php echo $id; ?>" method="post">
<div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" Required class="form-control" value="<?php echo $row['sno'] ?>">
</div>
<div class="form-group">
    <label for="uname">Username</label>
    <input type="text" name="uname" Required class="form-control" value="<?php echo $row['username'] ?>">
</div>
<div class="form-group">
    <label for="password">password</label>
    <input type="text" name="password" Required class="form-control" value="<?php echo $row['password'] ?>">
</div>
<input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php require 'partials/_footer.php' ?>
  </body>
</html>