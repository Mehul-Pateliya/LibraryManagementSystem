<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .container-fluid {
            height: 721px;
            background: linear-gradient(to top, #0062E6, #a733ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {

            width: 400px;
            height: 500px;
            padding: 50px 40px;
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
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }


        @media screen and (max-width: 430px) {
            .box {
                width: 100%;
            }
        }
    </style>


    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        } 
    </script>

</head>

<body>


    <div class="container-fluid">

        <div class="box">
            <div style="text-align: center;">
                <img src="image\user.jpeg" alt="" class="user">
            </div>
            <h3>SIGN IN</h3>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <p>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="user" placeholder="Enter username" name="usern"
                            required>
                    </div>
                    </p>

                </div>
                <div class="form-group">
                    <p>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"
                            required>
                    </div>
                    </p>
                </div>


                <div class="col-sm-offset-3   col-sm-6">
                    <p>
                        <button type="submit" onclick="" class="btn btn-default btn-block" id="button1" name="submit"
                            style="border-radius:10px;">SIGN IN</button>
                    </p>

                </div>

                <div class="col-sm-12">
                    <p style="color:white;">
                        if you not register
                        <a style="color: rgb(255, 251, 8); text-decoration: none;" href="registerpage.php">Sign-up</a>

                    </p>

                </div>
                <div class="col-sm-12">
                    <p>

                        <a style="color: white; text-decoration: none;" href="updatepassword.php">Forgot password?</a>

                    </p>

                </div>


            </form>


        </div>
    </div>


    <?php

if(isset($_POST['submit']))
{
  $count=0;
  $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[usern]' && password='$_POST[pwd]';");
  $row= mysqli_fetch_assoc($res);
  $count=mysqli_num_rows($res);

  if($count==0)
  {
    ?>

    <script type="text/javascript">
        alert("The username and password doesn't match.");
    </script>



    </div>
    <?php
  }
  else
  {
    session_id('admin');
    session_start();
    $_SESSION['login_auser'] = $row['username'];
    $_SESSION['login_apassword']=$row['password'];
    header("location:homepage.php");
  }
}

?>


</body>

</html>