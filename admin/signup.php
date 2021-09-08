<?php
$connect = mysqli_connect("localhost", "root", "", "nihal");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>SignUp</title>
</head>


<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  // echo $id;

  $data = "select * from data where id=$id";
  $record = mysqli_query($connect, $data);
  $row = mysqli_fetch_array($record);
}
?>

<body>

  <div class="cotainer">
    <div class="row justify-content-center mt-3">
      <div class="col-md-5">

        <div class="jumbotron">
          <h3 class="display-4 justify-content-center mb-3" style="font-size: 45px; font-weight: 320; text-align: center;">SignUp</h3>

          <form action="" method="post">

            <div class="form-group ">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo @$row[0]; ?>" placeholder="Full Name">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo @$row[1] ?>" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="idno">ID No.</label>
              <input type="number" class="form-control" name="idno" value="<?php echo @$row[2] ?>" placeholder="ID NO.">
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" name="role">
                <option>--Select--</option>
                <option value="admin" <?php if (@$row[3] == "admin") echo "selected" ?>>Admin</option>
                <option value="user" <?php if (@$row[3] == "user") echo "selected" ?>>User</option>
              </select>
            </div>
            <!-- value="<?php echo @$row[3] ?>"  -->

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="user" value="<?php echo @$row[4] ?>" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>

            <div class="form-group">
              <label for="cpass">Confirm Password</label>
              <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-success  mt-3" name="btn" style="width: 100px; margin-left: 15%;">Add</button>
            <button type="submit" class="btn btn-primary  mt-3" name="btn1" style="width: 100px; margin-left: 15%;">Update</button>
            <input type="hidden" name="hid" value="<?php echo @$row[2] ?>">


          </form>
        </div>
      </div>
    </div>
  </div>


  <?php

  /////////////////// INSERT ///////////////////////////////

  if (isset($_POST["btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $idno = $_POST["idno"];
    $role = $_POST["role"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    if ($name == "" || $email == "" || $idno == "" || $role == "" || $user == "" || $pass == "" || $cpass == "") {
      echo "<script>alert('Input Not Filled');</script>";
      echo "<script>window.location='admin_index.php?page=ae'</script>";
    } else {
      if ($pass == $cpass) {

        $pass = base64_encode($pass);
        $insert = "insert into data values('$name','$email','$idno','$role','$user','$pass')";
        mysqli_query($connect, $insert) or die("hello");

        echo "<script>alert('Added Successfully');</script>";
        echo "<script>window.location='admin_index.php?page=ve'</script>";
      } else {
        echo "<script>alert('Password Not Matched');</script>";
        echo "<script>window.location='admin_index.php?page=ae'</script>";
      }
    }
  }


  ///////////////////////////////// UPDATE /////////////////////////

  if (isset($_POST["btn1"])) {
    $id = $_POST["hid"];
    // echo  $id;

    $name = $_POST["name"];
    $email = $_POST["email"];
    $idno = $_POST["idno"];
    $role = $_POST["role"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    if ($name == "" || $email == "" || $idno == "" || $role == "" || $user == "" || $pass == "" || $cpass == "") {
      echo "<script>alert('Input Not Filled');</script>";
      echo "<script>window.location='admin_index.php?page=ae'</script>";
    } else {
      if ($pass == $cpass) {

        $pass = base64_encode($pass);
        $update = "update data set name='$name',email='$email',id='$idno',role='$role',user='$user',pass='$pass' where id='$id'";
        // echo $update;
        mysqli_query($connect, $update) or die("uffff");


        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.location='admin_index.php?page=ve'</script>";
      } else {
        echo "<script>alert('Password Not Matched');</script>";
        echo "<script>window.location='admin_index.php?page=ae'</script>";
      }
    }
  }


  ////////////////////////// DELETE ///////////////////////////////

  if (isset($_GET["did"])) {

    $id = $_GET["did"];
    $delete = "delete from data where id='$id'";
    mysqli_query($connect, $delete) or die("hello");
    echo "<script>window.location='admin_index.php?page=ve'</script>";
  }

  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>