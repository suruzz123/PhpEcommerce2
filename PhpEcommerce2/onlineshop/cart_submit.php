<?php
session_start();

require_once("../classes/dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
  
    if(!empty($_POST["quantity"])) {

      $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE product_id='" . $_GET["product_id"] . "'");





      $itemArray = array(
        $productByCode[0]["product_id"]=>array(
                        'product_name'=>$productByCode[0]["product_name"], 
                        'product_id'=>$productByCode[0]["product_id"], 
                        'quantity'=>$_POST["quantity"], 
                        'product_price'=>$productByCode[0]["product_price"])
                      );


      //echo $productByCode[0]["product_id"];
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["product_id"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["product_id"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
    
 
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["product_id"] == $k)
            unset($_SESSION["cart_item"][$k]);  
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
    //header('location:show_cart.php');
  break;  
}
}
?>
