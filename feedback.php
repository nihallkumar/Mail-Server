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

  <title>Feedback</title>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-md-8">

        <div class="jumbotron">

          <form action="" method="post">

            <h1 class="display-4">Feedback</h1>
            <p class="lead">Thank you for taking the time you provide feedback.
              We appreciate hearing from you and will review your comment carefully.
            </p>

            <div class="row mt-4 justify-content-center">

              <div class="form-group col-md-8">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="eg:- John Wick">
              </div>

              <div class="form-group col-md-8">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>

              <div class="form-group col-md-8">
                <label for="rating">Rating</label>
                <select class="form-control" name="rating">
                  <option value="">--select--</option>
                  <option value="Worst">Excellent</option>
                  <option value="Bad">Good</option>
                  <option value="Average">Average</option>
                  <option value="Good">Bad</option>
                  <option value="Excellent">Worst</option>
                </select>
              </div>

              <div class="form-group col-md-8">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment" cols="30" rows="5" placeholder="Comment"></textarea>
              </div>

            </div>

            <button class="btn btn-primary" type="submit" name="btn" style="width: 100px; margin-left: 42%;">Submit</button>

        </div>

        </form>

      </div>
    </div>
  </div>

  <?php

  if (isset($_POST["btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    // print_r($_POST);
    if ($name == "" || $email == "" || $rating == "" || $comment == "")
      echo "<script>alert('Enter Valid Input');</script>";

    else {
      $insert = "insert into feed values ('','$name','$email','$rating','$comment')";
      mysqli_query($connect, $insert);
      echo "<script>alert('Feedback Send Successfully');</script>";
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