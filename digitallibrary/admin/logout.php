<?php
    session_id('admin');
	session_start();
	if(isset($_SESSION['login_auser']))
	{
		unset($_SESSION['login_auser']);
		unset($_SESSION['login_apassword']);
	}
	header("location:loginpage.php");
?>