<?php
 session_id('admin');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Books Request Page</title>
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



   .fa-sign-out
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
		.fa-sign-out:hover
		{
			opacity: .7;
		}
		
 </style>



</head>
<body >
​
<?php

$count=0; 
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
  $username=$row['username'];

?>


<nav class="navbar navbar-expand-md navbar-dark bg-dark  " style="padding-top: 0px;padding-bottom:0px;">


      <a href="#" class="navbar-brand" ><img src="image\Book.png" width="30" height="30" class="d-inline-block align-top" alt="">
      LIBRARY</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse"  data-target="#navbarCollapse">
          <span  class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">


  
             <ul class="nav navbar-nav"  >

                   <li class="nav-item "  >
                   <a class="nav-link "  href="homepage.php">Home</a>
                  </li>
   
                  <li class="nav-item " >
                  <a class="nav-link"   href="books.php">Books</a>
                  </li>


                  <li class="nav-item active">
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
                  alt="Profile" title="Profile" height="50" style="padding:5px">
                  </a>
                 </li>
                 <li  class="nav-item"><a class="nav-link" href="logout.php" ><span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a></li>
            </ul>



    </div>





  </div>

</nav>
​




<div class="container-fluid" >





<h1 style="text-align:center">Books Request</h1>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead style="background-color:#6d6a6a; color: White;">
        <tr>
          <th>Username</th>
          <th>Book-ID</th>
          <th>Approve-status</th>
          <th>Button</th>
        </tr>
      </thead>
      <tbody>
        
        <?php
       

     
      $q=mysqli_query($db,"SELECT * from issue_book where approve='pending' ;");
     
      if(mysqli_num_rows($q)==0)
      {
       echo "<tr >";
       echo "<td colspan='5'>"; echo "There's no  pending request"; echo "</td>";
       echo "</tr>";
      }
      else
      {
       while($row=mysqli_fetch_assoc($q))
       {
                 $b=mysqli_query($db,"SELECT * from books where bid='$row[bid]';");
                
                 $count=mysqli_fetch_assoc($b);
                
                  

                 
                 echo "<tr class='table-active'>";
                 echo "<td class='usern'>"; echo $row['username']; echo "</td>";
                 echo "<td class='bi'>"; echo $row['bid']; echo "</td>";
                 echo "<td>"; echo $row['approve']; echo "</td>";
                
                

                 echo "<td style='text-align:center;'>"; 
                 echo  "<a href='approve.php?id=$row[bid] &amp;username=$row[username]' style='cursor: pointer;text-decoration: none; background-color: #7e7e91;color: white;border-radius: 3px;padding: 8px;'>APPROVE</a>";
                
                 echo "</td>";
                 echo "</tr>";
                
                 
                 
       }

      


      }






        ?>



        
      </tbody>
    </table>
  </div>
</div>




   
</body>
</html>
​
​
​
