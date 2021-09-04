<?php
include("connection.php");
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>updatepassword</title>
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

    <script>
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
         window.history.pushState(null, "", window.location.href);
      };

  });

    </script>

</head>

<body>

    <div class="container-fluid">

        <div class="box">
            <div style="text-align: center;">
                <img src="image\updatepwd.jpg" alt="" class="user">
            </div>
            <h3>UPDATE PASSWORD</h3>
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
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                            required>
                    </div>

                    </p>

                </div>



                <div class="form-group">
                    <p>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter new password"
                            name="newpassword" required>
                    </div>
                    </p>

                </div>

                <div class="col-sm-offset-3   col-sm-6">
                    <p>
                        <button type="submit" onclick="" class="btn btn-default btn-block" id="button1" name="submit"
                            style="border-radius:10px;">SUBMIT</button>
                    </p>

                </div>

                <div class="col-sm-12">
                    <div style="color:white;">
                        if password updated then
                        <a style="color: rgb(255, 251, 8); text-decoration: none;" href="loginpage.php">Sign-in</a>
                    </div>

                </div>


            </form>


        </div>
    </div>







    <?php

//$count=0; 
if(isset($_POST['submit']))
{
//$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[usern]' && email='$_POST[email]';");
//$row= mysqli_fetch_assoc($res);
//$count=mysqli_num_rows($res);

//echo $count;
$q=mysqli_query($db,"SELECT * FROM student WHERE username='$_POST[usern]' && email='$_POST[email]';");
$row=mysqli_fetch_assoc($q);
$newpassword=$_POST['newpassword'];
$username=$_POST['usern'];
$first=ucfirst(strtolower($row['first']));
$middle=ucfirst(strtolower($row['middle']));

$sql= "UPDATE student SET  password='$newpassword'  WHERE username='$_POST[usern]' && email='$_POST[email]';";

if(mysqli_query($db,$sql))
    {
        ?>
    <script type="text/javascript">
        alert("password update Successfully.");
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
$mail->Subject = 'Updated  password  !';
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
 your <b>Username</b> is  '.$username.' and <b> updated Password </b>  is '.$newpassword.'  .kindly use these credentials to log-in.
</div>
 
</div>



</div>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if($mail->send())
{
    header("location:loginpage.php");
}
else
{
 
}


    }
  

}

?>


</body>

</html>