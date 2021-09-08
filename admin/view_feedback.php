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

  <title>View Feedback</title>
</head>
<style>
  * {
    overflow: hidden;
  }

  .card {
    margin-top: 10px;
    margin-right: 10px;
    margin-left: 10px;
    margin-bottom: 10px;
  }

  .scroll {
    width: 100%;
    height: 530px;
    overflow-x: hidden;
    overflow-y: auto;
    text-align: justify;
  }
</style>

<body>

  <div class="container scroll">
    <div class="row justify-content-around mt-3">


      <?php
      $select = "select * from feed";
      $result = mysqli_query($connect, $select);
      while ($col = mysqli_fetch_array($result)) {

      ?>

        <div class="card col-md-3 " style="border: 1px solid black; background-color: lightgray;">
          <div class="card-body">
            <h5 class="card-title" style="font-size:25px ; font-weight: 370;"><?php echo $col[1] ?></h5>
            <h4 class="card-subtitle mt-2 mb-2"><?php echo $col[3] ?></h4>
            <p class="card-text"><?php echo $col[4] ?></p>
            <p class="card-text"><?php echo "~" . $col[2] ?></p>
          </div>
        </div>

      <?php
      }
      ?>



    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>