<?php include("../onlineshop/connect.php"); ?>
<?php 

	$id = $_POST['id'];
	$product_name = $_POST['product_name'];
	$product_details = $_POST['product_details'];
	$product_price = $_POST['product_price'];
	$product_status = $_POST['product_status'];
	$product_category = $_POST['product_category'];
	$product_image = "";
	$target_dir = "../uploads/";	
    echo $_FILES['product_image']['name'];    
    if(isset($_FILES['product_image']['name'])){
     $product_image_f = $target_dir . basename($_FILES['product_image']['name']);
      $errors= array();
      $file_name = $_FILES['product_image']['name'];
      $file_size =$_FILES['product_image']['size'];
      $file_tmp =$_FILES['product_image']['tmp_name'];
      $file_type=$_FILES['product_image']['type'];      
    $allowed =  array("jpeg","jpg","png");
	$filename = $_FILES['product_image']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array(strtolower($ext),$allowed) ) {
	    //echo 'error';
	    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	}
      
      if($file_size > 5097152){
         $errors[]='File size must be exactly 5 MB';
      }      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp, $product_image_f);
         $product_image = 'uploads/'.$filename;
      }else{
        print_r($errors);
      }
   }
   else
   {
   	echo "Not uploaded";
   }
	if($id >0)
	{

		$updated_at = date('Y-m-d H:i:s');

		if($product_image !="")
		{

		$query ="UPDATE `products` SET `product_name`='$product_name',`product_details`='$product_details',`product_price`='$product_price',`product_image`='$product_image',`product_category`='$product_category',`product_status`='$product_status',`updated_at`='$updated_at' WHERE product_id = '$id'";
		}
		else
		{

		$query ="UPDATE `products` SET `product_name`='$product_name',`product_details`='$product_details',`product_price`='$product_price',`product_category`='$product_category',`product_status`='$product_status',`updated_at`='$updated_at' WHERE product_id = '$id'";
		}
	}
	else
	{
	    $created_at = date('Y-m-d H:i:s');

		

		$query ="INSERT INTO `products`(`product_id`, `product_name`, `product_details`, `product_price`, `product_image`, `product_category`, `product_status`, `created_at`) VALUES (NULL,'$product_name','$product_details','$product_price','$product_image','$product_category','$product_status','$created_at')";
	}
	
	
	
	$res = mysqli_query($con, $query);
	if(!$res)
	{
		header('Location: product.php');
	}
	else
	{
		//echo 1;
		header('Location: product_list.php');
	}
    ?> 