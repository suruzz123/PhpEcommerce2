<?php 
session_start();
// if(isset($_SESSION['login_id']))
// {
//   if($_SESSION['user_type']=='admin')
//   {

//   }
//   else{
//     header('location: ../onlineshop');
//   }
// }
// else
// {
//    header('location: ../onlineshop');
// }
?>

<?php include("../onlineshop/connect.php"); ?>






<?php 


          $sql = "SELECT products.*, categories.category_name FROM products INNER JOIN categories on products.product_category=categories.id ORDER BY product_name DESC";
          $result = mysqli_query($con,$sql);




          while($row = mysqli_fetch_assoc($result)) 
          {
              $array[] = $row;
          }


echo json_encode($array); 

?>
