<?php 
session_start();

if(isset($_SESSION['login_id']))
{
	
	session_destroy();
	header('location: ../onlineshop/login.php');
}
else
{
	header('location: ../onlineshop/index.php');
}

?>
