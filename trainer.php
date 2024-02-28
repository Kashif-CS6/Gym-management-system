<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>Trainers Details</title>
</head>

<body>
<div class="container my-3">
  <h1>Trainers Details</h1>
        <?php include 'partials/_dbconnect.php'?>
        <table class="table table-hover table-bordered table-scripted">
          <thead>
            <tr>
            <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Timing</th>
              

            </tr>
          </thead>
          <tbody>
            <?php
            $query="select * from `tr`";
            $result=mysqli_query($conn,$query);
            if (!$result){
              die("query Failed".mysqli_error());
            }else{
              while($row=mysqli_fetch_assoc($result)){
              ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['timing']; ?></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
    </php>
</body>
</html>