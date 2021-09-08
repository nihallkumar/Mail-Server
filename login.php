<?php
$connect = mysqli_connect("localhost", "root", "", "nihal");
?>

<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Login</title>
</head>

<body>
  <div class="cotainer">
    <div class="row justify-content-center mt-3">
      <div class="col-md-4">

        <div class="jumbotron">
          <form action="" method="post">

            <h3 class="display-4 justify-content-center mb-3" style="font-size: 45px; font-weight: 320; text-align: center;">Login</h3>


            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary mt-3" name="btn1" style="width: 100px;">Login</button>

            <small id="emailHelp" style="word-spacing: 5px;" class="form-text text-muted"><a href="#">Forgot_Password?</a> </small>

          </form>
        </div>

      </div>
    </div>
  </div>

  <?php

  if (isset($_POST["btn1"])) {
    // print_r($_POST);

    $user = $_POST["user"];
    $pass = base64_encode($_POST["pass"]);

    $select = "select * from data where user='$user' and pass='$pass'";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
      // if($row[3]=="admin")
      //     header("location:admin/admin_index.php?id='$row[2]'");

      // else if($row[3]=="employ")
      //     header("location:user/user_index.php?id='$row[2]'");

      if ($row[3] == "admin") {
        $_SESSION['id'] = $row[2];
        $_SESSION['n'] = $row[0];
        $_SESSION['un'] = $row[4];

        echo "<script>window.location='admin/admin_index.php?page=hm'</script>";
      }

      if ($row[3] == "user") {
        $_SESSION['id'] = $row[2];
        $_SESSION['n'] = $row[0];
        $_SESSION['un'] = $row[4];

        echo "<script>window.location='user/user_index.php?page=hm'</script>";
      }
    } 
    else {
      echo "<script>alert('Invaild Id');</script>";
      echo "<script>window.location='index.php?page=li'</script>";
    }
  }

  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>