<?php
session_id('admin');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

  <script>


    $(document).ready(function(){
      $('body').each(function(index,element)  {
           var exp = new RegExp(String.fromCharCode(8203),"g")
           var editor= $(element);
           var newText = editor.html().replace(exp,'');

           
       
           console.log("Old text: "+editor.html());
           editor.html(newText);
           console.log("New text: "+editor.html());

          
      });

    
      history.pushState(null,  document.title, location.href);  
    

       
    });
    
    

  </script>  

   

  

    
 

 <style>

  

   .fa
		{
			margin: 0px 5px;
			padding: 5px;
			font-size: 20px;
			width: 30px;
			height: 30px;
			text-align: center;
			text-decoration: none;
			border-radius: 50%;
		}
		.fa:hover
		{
			opacity: .7;
		}
		.fa-facebook
		{
			background: #3B5998;
			color: white;
		}
		.fa-twitter
		{
			background: #55ACEE;
			color: white;
		}
		.fa-google
		{
			background: #dd4b39;
			color: white;
		}
		.fa-instagram
		{
			background: #125688;
			color: white;
		}
		.fa-yahoo
		{
			background: #400297;
			color: white;
		}


    
  #content
  {
    height: 540px; 
    background-image: url('backg.jpg');
    background-repeat: no-repeat;
    background-size:100% 100%;

  }

  .box
  {
   padding-top:155px;

  }

  @media screen and (max-width: 560px) {
            #content {
            
            background-image: url('msu.jpeg');
            

        }

  }
 

  
 </style>




</head>
<body >
​
<?php

$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_SESSION[login_auser]' && password='$_SESSION[login_apassword]';");
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);


  $first=$row['first'];
  $middle=$row['middle'];
  $last=$row['last'];
  $eid=$row['eid'];
  $email=$row['email'];
  $mobileno=$row['mobilenumber'];
  $photo=$row['image'];

?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark  " style="padding-top: 0px;padding-bottom:0px;">



      <a href="#" class="navbar-brand" ><img src="image\Book.png" width="30" height="30" class="d-inline-block align-top" alt="">
      LIBRARY</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse"  data-target="#navbarCollapse">
          <span  class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">


  
             <ul class="nav navbar-nav"  >

                   <li class="nav-item active"  >
                   <a class="nav-link "  href="homepage.php">Home</a>
                  </li>
   
                  <li class="nav-item " >
                  <a class="nav-link"   href="books.php">Books</a>
                  </li>


                  <li class="nav-item ">
                  <a class="nav-link"    href="bookrequest.php">Requests</a>
                 </li>

                 <li class="nav-item ">
                 <a class="nav-link"      href="fine.php">Fine</a>
                 </li>

                 <li class="nav-item ">
                 <a class="nav-link"   href="student.php">Student</a>
                 </li>


                  <li class="nav-item">
                  <a class="nav-link"      href="feedback.php">Feedback</a>
                 </li>
  
            </ul>


            <ul class="navbar-nav ml-auto nav-flex-icons navbar-right">
                  <li class="nav-item avatar">
                  <a class="nav-link p-0" href="profile.php">
                  <img src="image\<?php echo $photo ?>" class="rounded-circle z-depth-0"
                  alt="Profile" title="Profile"  height="50" style="padding:5px">
                  </a>
                 </li>
                 <li  class="nav-item"><a class="nav-link" href="logout.php" ><span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a></li>
            </ul>

  

    </div>





  </div>
</nav>
​
<div class="container-fluid"   id="content">
  <div class="box" >
    <h1 style="text-align: center; font-size: 30px; color:#f7bc14;">Welcom to library</h1>
    <h1 style="text-align: center;font-size: 25px; color: white;">Opens at: 09:00 </h1>
    <h1 style="text-align: center;font-size: 25px;color: #c0ef74;">Closes at: 15:00 </h1>
  </div>
  
  
</div>

​

<footer class="page-footer font-small  pt-4" style="background-color:rgb(33 28 36);" id="footer">

  <div class="container" >
    
    <h4 style="color:white;text-align: center;">Contact us through social media</h4>
  
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
          <i class="fa fa-facebook"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fa fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fa fa-google"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
          <i class="fa fa-instagram"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-dribbble mx-1">
          <i class="fa fa-yahoo"> </i>
        </a>
      </li>
    </ul>

  </div>
  <div style="color:white;text-align: center;">
  Email: &nbsp librarymanagment2020@gmail.com
  </div>

</footer> 



</body>
</html>
​
​
​
