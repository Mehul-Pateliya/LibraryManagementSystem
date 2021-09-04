<?php
 include("connection.php");
 error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGN UP</title>
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
            height: 650px;
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


    <script>
        $(document).ready(function () {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, "", window.location.href);
            };

        });

    </script>


</head>

<body>

    <div class="container-fluid">

        <div class="box">
            <div style="text-align: center;">
                <img src="image\signup.png" alt="" class="user">
            </div>
            <h3>SIGN UP</h3>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="fn" placeholder="Enter fisrt name" name="firstname"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="mn" placeholder="Enter middle name"
                            name="middlename" required>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="lastname"
                            required>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="eid" placeholder="Enter eid" name="eid" required>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="mon" placeholder="Enter mobile number"
                            name="mobilenumber" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                            required>
                    </div>
                </div>




                <div class="col-sm-offset-3   col-sm-6">
                    <div>
                        <button type="submit" onclick="" class="btn btn-default btn-block" name="signup" id="button1"
                            style="border-radius:10px;">SIGN UP</button>
                    </div>

                </div>

                <div class="col-sm-12">
                    <div style="color:white;">
                        if you register then
                        <a style="color: rgb(255, 251, 8); text-decoration: none;" href="loginpage.php">Sign-in</a>
                    </div>

                </div>

            </form>

        </div>
    </div>


    <?php

if(isset($_POST['signup']))
{


$string1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

$string2="0123456789";


 $username=substr(str_shuffle($string1),0,6);
 $password=substr(str_shuffle($string2),0,6);
 $first=ucfirst(strtolower($_POST['firstname']));
 $middle=ucfirst(strtolower($_POST['middlename']));
 


        $count=0;

        $sql="SELECT username from `admin`";
        $res=mysqli_query($db,$sql);
        
        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$username)
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `admin` VALUES('$_POST[firstname]','$_POST[middlename]','$_POST[lastname]','$_POST[eid]','$_POST[mobilenumber]','$_POST[email]','$username','$password','user.jpeg');");
        ?>
    <script type="text/javascript">
        alert("Registration successful");

    </script>
    <?php


require "phpmailer/PHPMailerAutoload.php";
$mail=new PHPMailer;
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
$mail->isSMTP();                                        // Send using SMTP
$mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'librarymanagment2020@gmail.com';                     // SMTP username
$mail->Password   = 'library308';                              // SMTP password
$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom('librarymanagment2020@gmail.com');
$mail->addAddress($_POST['email']);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('librarymanagment2020@gmail.com');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Register username and password';
$mail->Body    = '<div style="border:2px black solid;">


<div style="text-align: center;">
  <img src="https://freepngimg.com/thumb/book/13-books-png-image-with-transparency-background.png" style="height: 100px; width: auto;"  alt="">
  <div style="text-transform: capitalize; font-variant: small-caps; font-weight: bold;color:#1c2c7c;font-size: 25px;   ">library managment system</div>



 <hr size="8" color="red"  noshade>

</div>

<div style="padding:30px 20px;">
<div>
Dear '.$first.' '.$middle.',
</div>
 <div>
 your <b>Username</b> is  '.$username.' and <b> Password </b>  is '.$password.'  .kindly use these credentials to log-in.
 </div>
 
</div>



</div>
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if($mail->send())
{
    header("location:loginpage.php");
}
else
{
   
}

        



        }
        else
        {

          ?>
    <script type="text/javascript">
        alert("The username already exist.");
    </script>
    <?php

        }






}

?>




</body>

</html>