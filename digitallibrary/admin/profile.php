<?php
 session_id('admin');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .container-fluid {
            height: 721px;
            background: linear-gradient(to top, #0062E6, #a733ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {

            width: 700px;
            height: 250px;
            padding: 10px 40px;
            box-sizing: border-box;
            background: linear-gradient(#0062E6, #a733ff);
            border-radius: 2%;
        }

        h3 {
            text-align: center;
            color: white;
        }

        .user {
            margin: 0px;
            padding: 0px;
            position: relative;
            top: -60px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }



        @media screen and (max-width: 730px) {
            .box {
                width: 100%;
            }
        }

        @media screen and (max-width: 430px) {
            .box {
                height: 300px;
            }
        }
    </style>


    <script>
        $(document).ready(function () {
            window.history.pushState(null, "", window.location.href);

        });




    </script>

</head>

<body>


    <?php

$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_SESSION[login_auser]' && password='$_SESSION[login_apassword]';");
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);


  $first=strtoupper($row['first']);
  $middle=strtoupper($row['middle']);
  $last=strtoupper($row['last']);
  $eid=$row['eid'];
  $email=$row['email'];
  $mobileno=$row['mobilenumber'];
  $photo=$row['image'];

?>


    <div class="container-fluid">
        <div class="box">

            <div style="text-align: center;height: 40px;">
                <img src="image\<?php echo  $photo ?>" alt="profile" class="user">
            </div>

            <h3>
                <?php echo  $first."  ".$middle."  ".$last;?>
            </h3>

            <div style="text-align:center;">
                <i class="fa fa-phone" style="font-size:24px;color:#a9ff01;">
                    <?php echo $mobileno;?>
                </i>
            </div>

            <div style="text-align:center">
                <i class="fa fa-envelope" style="font-size:24px;color:#e4ff05;">
                    <?php echo $email;?>
                </i>
            </div>




            <form class="form-horizontal" method="POST">
                <p>

                <div class="col-sm-offset-5   col-sm-2" style="text-align:center;">
                    <button type="submit" name="editprofile"
                        style="border-radius:10px;height:35px;border:white;width:60px">EDIT</button>
                </div>

                </p>

            </form>

        </div>
    </div>


    <?php

if(isset($_POST['editprofile']))
{
  ?>
    <script type="text/javascript">
        window.location = "editprofile.php"
    </script>
    <?php
}
?>









</body>

</html>