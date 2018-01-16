<?php include("../onlineshop/connect.php"); ?>
<?php 
	$id = $_REQUEST['id'];
    $query ="DELETE FROM `products` WHERE product_id = '$id'";
	$res = mysqli_query($con, $query);
	if(!$res)
	{
		header("location: product_list.php");
	}
	else
	{
		//echo 1;
		header("location: product_list.php");
	}	
 ?>