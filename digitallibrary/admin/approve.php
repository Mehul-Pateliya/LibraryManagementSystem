<?php
session_id('admin');
session_start();
include("connection.php");
error_reporting(0);



$user=$_GET['username'];
$bid=$_GET['id'];

//echo $user;
//echo $bid;
  
  $date = new DateTime();
  $startdate = $date->format('Y-m-d');

 $i=mysqli_query($db,"SELECT * from issue_book where approve='pending' and username='$user' and bid='$bid';");

 while($temp=mysqli_fetch_assoc($i))
 {

   $b=mysqli_query($db,"SELECT * from books where bid='$temp[bid]';");
   $count=mysqli_fetch_assoc($b);
   $quan=$count['quantity'];
   if($quan>0)
   {
     $quan=$quan-1;
           if($quan<=0)
           {
             $status='Unavailable';
             mysqli_query($db,"UPDATE books SET  status='$status', quantity='0'   WHERE bid='$temp[bid]';");
             
           }
           else
           {
             mysqli_query($db,"UPDATE books SET   quantity='$quan'   WHERE bid='$temp[bid]';");
            
           }
            mysqli_query($db,"UPDATE issue_book SET  issue='$startdate' , approve='approve'  WHERE bid='$temp[bid]' and username='$user' and bid='$bid' and approve='pending';");

   }
   else
   {
     mysqli_query($db,"UPDATE issue_book SET  approve='discade'  WHERE bid='$temp[bid]' and username='$user' and bid='$bid' and approve='pending';");

   }

 }



 header("location:bookrequest.php");












?>