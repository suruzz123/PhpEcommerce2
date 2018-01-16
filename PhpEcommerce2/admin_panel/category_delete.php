<?php include("../onlineshop/connect.php"); ?>


<?php 


	$id = $_REQUEST['id'];

	

    $query ="DELETE FROM `categories` WHERE id = '$id'";

	



	$res = mysqli_query($con, $query);

	if(!$res)
	{
		echo 0;
	}
	else
	{
		echo 1;

		header("location: category_list.php");
	}
	
 ?>
