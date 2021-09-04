<?php
session_id('student');
session_start();
include("connection.php");
error_reporting(0);

$bid=$_GET['id'];

$q="DELETE FROM issue_book WHERE bid='$bid' and username='$_SESSION[login_suser]' and approve='pending'";

mysqli_query($db,$q);
header("location:bookrequest.php");
?>