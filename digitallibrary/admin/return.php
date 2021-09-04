<?php
session_id('admin');
session_start();
include("connection.php");
error_reporting(0);

$user=$_GET['username'];
$bid=$_GET['id'];
         
// echo $user;
// echo $bid;
         $date = new DateTime();
         $enddate = $date->format('Y-m-d');
    
         $i=mysqli_query($db,"SELECT * from issue_book where approve='approve' and username='$user' and bid='$bid' ;");

       
        while($temp=mysqli_fetch_assoc($i))
         {

          $b=mysqli_query($db,"SELECT * from books where bid='$temp[bid]';");
          $count=mysqli_fetch_assoc($b);
          $quan=$count['quantity'];
          $quan=$quan+1;
          $status='Available';
          mysqli_query($db,"UPDATE books SET  status='$status', quantity='$quan'   WHERE bid='$temp[bid]';");
          mysqli_query($db,"UPDATE issue_book SET approve='returned' , returnd='$enddate' where username='$user' and bid='$bid' and approve='approve'; ");
          

         }
        
      
    

        header("location:fine.php");

?>



       