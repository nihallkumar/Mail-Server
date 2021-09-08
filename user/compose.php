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

  <title>Compose</title>
</head>

<script>
  function to(anchor) {
    var user = anchor.getAttribute('value');
    var str = cmpfrm.to.value;
    var strarr = str.split(",");
    var status = false;

    for (var i = 0; i < strarr.length; i++) {
      if (strarr[i] == user)
        status = true;
    }

    if (status == false)
      cmpfrm.to.value += user + ",";

  }
</script>

<?php
if (isset($_GET["mid"])) {
  @$act = $_GET["act"];

  $mid = $_GET["mid"];
  $select = "select * from mail where mid=$mid";
  $record = mysqli_query($connect, $select);
  $row = mysqli_fetch_array($record);

  $nmsg = ($row[4]);

  $nmsg = strip_tags($nmsg);

  // echo $row[4];
}
?>

<style>
  .scroll {
    width: 100%;
    height: 330px;
    overflow-x: hidden;
    overflow-y: auto;
    text-align: justify;
  }
</style>

<body>

  <div class="container">
    <div class="row mt-3 justify-content-around">

      <div class="jumbotron col-md-8">

        <h3 class="display-4 justify-content-center mb-3" style="font-size: 45px; font-weight: 320; text-align: center;">Send Mail</h3>

        <form action="" name="cmpfrm" method="post" enctype="multipart/form-data">

          <input type="hidden" name="from" value="<?php echo $_SESSION["un"] ?>">

          <!-- <input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>"> -->

          <div class="form-group row">
            <label for="to" class="col-sm-2 col-form-label" style="font-weight: bold;">To</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="to" value="<?php if (@$act == 'rep') echo @$row[1] . ","; ?>" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="subject" class="col-sm-2 col-form-label" style="font-weight: bold;">Subject</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sub" value="<?php echo @$row[3]; ?>" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="message" class="col-sm-2 col-form-label" style="font-weight: bold;">Message</label>
            <div class="form-floating col-sm-10">
              <textarea class="form-control" rows="10" name="msg" value=""><?php echo @$nmsg ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="file" class="col-sm-2 col-form-label" style="font-weight: bold;">Attach File</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" name="file" name="file">
            </div>
          </div>  

          <button type="submit" class="btn btn-primary mt-3" style="margin-left: 41%; width: 100px;" name="btn">Send</button>

        </form>
      </div>

      <!-- table ///////////////////////////////////////////////////////// -->

      <?php
      if (@$act != "rep") {

      ?>

        <div class="jumbotron col-md-3" style="height: 500px; padding: 30px; padding-top: 60px;">
          <h3 class="display-4 justify-content-center mb-3" style="font-size: 45px; font-weight: 320; text-align: center;">To</h3>

          <div class="scroll">

            <table class="table">
              <?php
              $srno = 1;
              $user = $_SESSION["un"];
              $select = "select * from data where not user in('admin','$user')";
              $result = mysqli_query($connect, $select);
              while ($col = mysqli_fetch_array($result)) {

              ?>

                <tr>
                  <td style="font-weight:370 ;"><?php echo $srno++; ?></td>
                  <td><a href="#" name="user" value="<?php echo $col[4] ?>" style="text-decoration: none; color:black; font-weight: 450;" onclick="to(this)"><?php echo $col[0]; ?></a></td>
                </tr>

              <?php
              }
              ?>

            </table>
          </div>

        </div>

      <?php
      }
      ?>

    </div>
  </div>


  <!-- /////////// CODE //////////// -->

  <?php
  if (isset($_POST["btn"])) {
    // print_r($_POST);
    // print_r($_FILES);

    $from = $_POST["from"];
    $to = $_POST["to"];
    $to = substr($to, 0, strlen($to) - 1);
    $toarr = explode(',', $to);
    $sub = $_POST["sub"];
    $msg = nl2br($_POST["msg"] . "<br/>" . "->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->" . "<br/>"."");
    $file = $_FILES["file"]["name"];

    date_default_timezone_set('Asia/Kolkata');
    $date = date("d-m-Y , H:i:s");
    $df = 'n';
    $dt = 'n';

    if(move_uploaded_file($_FILES["file"]["tmp_name"], "Docs/$file"))
    {
      echo $file;
    }

    if ($to == "" || $sub == "" || $msg == "") {
      echo "<script>alert('Input Not Filled');</script>";
    } else {
      foreach ($toarr as $strto) {
        $input = "insert into mail values('','$from','$strto','$sub','$msg','$file','$date','$df','$dt')";
        mysqli_query($connect, $input) or die("hello");
      }
      echo "<script>alert('Sent Successfully!!!');</script>";
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