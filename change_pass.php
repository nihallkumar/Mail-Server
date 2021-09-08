<?php
$connect = mysqli_connect("localhost", "root", "", "nihal");
?>

<!-- <?php
      session_start();
      ?> -->

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
      <div class="col-md-5">

        <div class="jumbotron">

          <form action="" method="post">

            <h4 class="display-4  mb-3" style="font-size: 45px; font-weight: 320; text-align: center;">Change Password</h4>


            <div class="form-group">
              <label for="opass">Old Password</label>
              <input type="text" class="form-control" name="old" id="opass" aria-describedby="emailHelp" placeholder="Old Password">
            </div>

            <div class="form-group">
              <label for="npass">New Password</label>
              <input type="password" class="form-control" name="new" id="npass" placeholder="New Password">
            </div>

            <div class="form-group">
              <label for="cpass">Confirm Password</label>
              <input type="password" class="form-control" name="con" id="cpass" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary mt-3" name="btn">Update</button>


          </form>
        </div>

      </div>
    </div>
  </div>


  <!-- ///// CODE ///// -->
  <?php

  if (isset($_POST["btn"])) {
    // echo "hello";

    $id = $_SESSION['id'];
    // echo $id;
    $old = $_POST["old"];
    $new = $_POST["new"];
    $con = $_POST["con"];

    $select = "select * from data where id='$id'";
    $result = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($result);

    // echo $row[5];

    if ($row[5] == $old) {
      if ($new == $con) {
        // echo "hello";

        $update = "update data set pass='$new',cpass='$con' where id='$id'";
        mysqli_query($connect, $update);
        echo "<script>alert('Password Updated')</script>";
      } 
      else {
        echo "<script>alert('New Password Not Matched')</script>";
      }
    } 
    else {
      echo "<script>alert('Password Not Matched')</script>";
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