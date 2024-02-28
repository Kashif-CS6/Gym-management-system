<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: loginadmin.php");
    exit;
}
?>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">My Gym Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcomadmin.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['name']?></h4>
      <p>Hey how are you doing? Welcome to Gym Management. You are logged in as <?php echo $_SESSION['name']?>. You will execute this site as Admin
      best of luck for your services stayblessed!.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php"> using this link.</a></p>

    </div>
    
    </div>
  </div>
  <div class="container my-3">
  <h1>Registerd Users Details</h1>
        <?php include 'partials/_dbconnect.php'?>
        <table class="table table-hover table-bordered table-scripted">
          <thead>
            <tr>
            <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Register date</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $query="select * from `users`";
            $result=mysqli_query($conn,$query);
            if (!$result){
              die("query Failed".mysqli_error());
            }else{
              while($row=mysqli_fetch_assoc($result)){
              ?>
                <tr>
                  <td><?php echo $row['sno']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['password']; ?></td>
                  <td><?php echo $row['dt']; ?></td>
                  <td><a href="admin_update_users.php?id=<?php echo $row['sno'];?>" class="btn btn-success">Edit</a></td>
                  <td><a href="admin_delete_users.php?id=<?php echo $row['sno']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
        <?php
        if(isset($_GET['delete_msg'])){
          echo "<h6>".$_GET['delete_msg']."</h6>";
        }
        ?>
        <?php
        if(isset($_GET['update_msg'])){
          echo "<h6>".$_GET['update_msg']."</h6>";
        }
        ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php require 'partials/_footer.php' ?>
  </body>
</html>