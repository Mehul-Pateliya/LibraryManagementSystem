<?php
session_id('admin');
session_start();
include("connection.php");
error_reporting(0);



// $count=0;
$bookid=$_GET['id'];


$q=mysqli_query($db,"SELECT * from issue_book where bid='$bookid' and approve='approve'; ");


if(mysqli_num_rows($q)==0)
{

// $b=mysqli_query($db,"SELECT * from books where bid='$bookid'; ");
// if(mysqli_num_rows($b)==0)
// {
  

//}
//else
//{
  mysqli_query($db,"DELETE  from books where bid='$bookid'; ");
  
//}


}
header("location:books.php");



?>