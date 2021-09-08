  <?php
  $connect = mysqli_connect("localhost", "root", "", "nihal");
  ?>

  <?php
  // session_start();
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Inbox</title>
  </head>
  <style>
    * {
      overflow: hidden;
    }

    .scroll {
      /* width: 100%; */
      height: 390px;
      overflow-x: hidden;
      overflow-y: auto;
      text-align: justify;
    }
  </style>

  <body>
    <div class="container">
      <div class="row mt-3">
        <div class="jumbotron col-md-12" style="padding: 30px; padding-top: 40px;">

          <h3 class="display-4 justify-content-center" style="font-size: 45px; font-weight: 320;">Inbox</h3>

          <div class="scroll">
            <table class="table" id="example">

              <tbody>

                <?php

                $srno = 1;
                $user = @$_SESSION["un"];
                $select = "select * from mail where mto ='$user' and dt='n'";
                $result = mysqli_query($connect, $select);
                while ($col = mysqli_fetch_array($result)) {
                  $un = $col["1"];
                  $sub = strtoupper($col[3]);

                  $sel = "select * from data where user = '$un'";
                  $res = mysqli_query($connect, $sel);
                  $name = mysqli_fetch_array($res);

                  $msg = substr($col[4], 0, 40);
                  $msg = $msg . "...";
                ?>

                  <tr>
                    <td style="text-align: center;"><?php echo $srno++; ?></td>
                    <td style="text-align: center;"><a href="user_index.php?page=iv&id='<?php echo $col[0] ?>'" style="font-weight: bold; text-decoration: none; color: black;"><?php echo $name[0] ?></a></td>
                    <td><a href="user_index.php?page=iv&id='<?php echo $col[0] ?>'" style="font-weight: bold; text-decoration: none; color: black;"><?php echo $sub ?></a> &ensp; <?php echo $msg ?></td>
                  </tr>

                <?php
                }
                ?>
              <tbody>

              <tfoot>

              </tfoot>


            </table>
          </div>


        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>

  </html>