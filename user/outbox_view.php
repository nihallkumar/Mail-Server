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

  <title>View Mail</title>
</head>

<body>

  <?php

  if (isset($_GET["id"])) {
    // echo "hello";
    $mid = $_GET["id"];
    $select = "select * from mail where mid=$mid";
    $result = mysqli_query($connect, $select);
    $col = mysqli_fetch_array($result);

    $sub = strtoupper($col[3]);

    $un = $col[2];
    // echo $un;
    $sel = "select * from data where user='$un'";
    $res = mysqli_query($connect, $sel);
    $name = mysqli_fetch_array($res);
  }

  ?>

  <div class="container">
    <div class="row mt-3">
      <div class="jumbotron col-md-12" style="padding: 50px; padding-left: 50px;">

        <a href="user_index.php?page=ob" style="text-decoration: none; color: black; font-weight: 400;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
          </svg>
        </a>

        <span style="margin-left: 10px; font-size: 25px; font-weight: 370;">Outbox</span>

        <form action="" method="post">

          <h3 style="margin-top: 25px; margin-bottom: 15px;" id="sub"><?php echo $sub ?></h3>
          <span style="font-weight: 500; font-size: 23px;" id="name"><?php echo $name[0] ?></span> &nbsp; <span id="from" style="font-weight: 370; font-size: 23px;"><?php echo "~" . $col[2] ?></span>
          <h6 style="font-weight: 400;" id="date"><?php echo $col[6] ?></h6>
          <h6 style="font-weight: 500;" id="from"><?php echo 'From ' . ' ~' . $col[1] ?></h6>

          <p style="margin-top: 20px; margin-bottom: 30px;" id="msg"><?php echo $col[4] ?></p>

          <?php
          $filename = $col[5];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);

          if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="Docs/<?php echo $col[5] ?>" width="50px" height="50px" /></a>
            </div>
            

          <?php
          } else if ($ext == 'pdf') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="images/pdficon.png" width="50px" height="50px" /></a>
            </div>

          <?php
          } else if ($ext == 'ppt' || $ext=='pptx') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="images/ppticon.png" width="50px" height="50px" /></a>
            </div>

          <?php
          } else if ($ext == 'doc' || $ext == 'docx') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="images/wordicon.png" width="50px" height="50px" /></a>
            </div>

          <?php
          } else if ($ext == 'xls' || $ext == 'xlsx') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="images/excelicon.png" width="50px" height="50px" /></a>
            </div>

          <?php
          } else if ($ext == 'txt') {
          ?>

            <div class="container mb-3 mt-0">
              <a href="Docs/<?php echo $col[5] ?>" target="blank"><img src="images/txticon.png" width="50px" height="50px" /></a>
            </div>

          <?php
          } 
          ?>




          <a href="user_index.php?page=cm&mid='<?php echo $col[0] ?>'" class="btn btn-outline-warning" style="border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
              <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z" />
            </svg>Forward
          </a>

          <button class="btn btn-outline-danger" style="border: none;" name="del">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>Delete
          </button>

        </form>

      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['del'])) {
    $mid = $col[0];
    // echo $mid;
    // echo $col[5];
    $select = "update mail set df='y' where mid='$mid'";
    mysqli_query($connect, $select) or die("hello");
    if ($result) {
      echo "<script>alert('Mail Deleted Successfully');</script>";
      echo "<script>window.location='user_index.php?page=ob'</script>";
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