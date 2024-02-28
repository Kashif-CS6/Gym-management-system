<?php
 $login=false;
 $showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    
        $sql="select * from adm where name='$username' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['name']=$username;
            header("location:welcomadmin.php");
        }
        else{
        $showerror="invalid credintials";
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">My Gym Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="signup.php">User SignUp</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <?php 
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Sucessful login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
   </button>
   </div>';
    }   
    if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showerror.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
   </button>
   </div>';
    }
    
    ?>
    <div class="container my-4">
        <h2 class="text-center">Admin Login</h2>
        <form action="/loginsystem/loginadmin.php" method="post">
            <div class="form-group col-md-6" >
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
         </div>
         <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
         </div>
             <button type="submit" class="btn btn-primary col-md-6">Login</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>>