<?php
session_id('student');
session_start();
include("connection.php");
error_reporting(0);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>editprofile</title>
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

            width: 500px;
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

        @media screen and (max-width: 768px) {
            .container-fluid {
                height: 900px
            }

            .box {
                height: 800px;

            }
        }

        @media screen and (max-width: 530px) {
            .box {
                width: 100%;
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

$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_SESSION[login_suser]';");
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);


  $first=$row['first'];
  $middle=$row['middle'];
  $last=$row['last'];
  $prn=$row['prn'];
  $email=$row['email'];
  $mobileno=$row['mobilenumber'];
  $photo=$row['image'];

?>

    <div class="container-fluid">

        <div class="box">
            <div style="text-align: center;">
                <img src="image\edit.jpg" alt="" class="user">
            </div>
            <h3>EDIT PROFILE</h3>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="fn">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fn" placeholder="Enter fisrt name" name="fistname"
                            value="<?php echo $first;?> " required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="mn">Middle Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mn" placeholder="Enter middle name"
                            name="middlename" value="<?php echo $middle;?> " required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="ln">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="lastname"
                            value="<?php echo $last;?> " required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="prn">PRN:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="prn" placeholder="Enter prn" name="PRN"
                            value="<?php echo $prn;?>" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="mon">Mobile number:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mon" placeholder="Enter mobile number"
                            name="mobilenumber" value="<?php echo $mobileno;?> " required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                            value="<?php echo $email;?> " required>
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-4" for="file">profile photo:</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="file" name="photo">
                    </div>
                </div>



                <div class="col-sm-offset-4 col-sm-4">
                    <div>
                        <button type="submit" class="btn btn-default btn-block" id="button2"
                            name="updateprofile">SUBMIT</button>
                    </div>

                </div>




            </form>

        </div>
    </div>



    <?php 

 
  

if(isset($_POST['updateprofile']))
{
    $first=$_POST['fistname'];
    $middle=$_POST['middlename'];
    $last=$_POST['lastname'];
    $prn=$_POST['PRN'];
    $mobileno=$_POST['mobilenumber'];
    $email=$_POST['email'];
   
    if(empty($_FILES['photo']['name']))
    {
        $sql1= "UPDATE student SET  first='$first',middle='$middle', last='$last',prn='$prn',mobilenumber='$mobileno',email='$email'  WHERE username='$_SESSION[login_suser]' && password='$_SESSION[login_spassword]';";

    }
    else
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],"image/".$_FILES['photo']['name']);
        $photo=$_FILES['photo']['name'];
        $sql1= "UPDATE student SET  first='$first',middle='$middle', last='$last',prn='$prn',mobilenumber='$mobileno',email='$email',image='$photo' WHERE username='$_SESSION[login_suser]' && password='$_SESSION[login_spassword]';";

        
    }


    if(mysqli_query($db,$sql1))
    {
        ?>
    <script type="text/javascript">
        alert("profile update Successfully.");

    </script>
    <?php
    }
    
   
}
?>



</body>

</html>