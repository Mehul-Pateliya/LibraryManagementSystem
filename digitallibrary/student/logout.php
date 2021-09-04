<?php
    session_id('student');
	session_start();
	if(isset($_SESSION['login_suser']))
	{
		unset($_SESSION['login_suser']);
		unset($_SESSION['login_spassword']);
		
	}
	header("location:loginpage.php");
?>
