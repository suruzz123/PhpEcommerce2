<?php 
session_start();
include("connect.php"); 
?>


<?php 

require_once("../classes/dbcontroller.php");
$db_handle = new DBController();

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Category Name</h1>
          <div class="list-group">

            <?php

          $sql = "SELECT categories.* FROM categories LEFT JOIN products on products.product_category=categories.id WHERE products.product_status =1  GROUP BY products.product_category ORDER BY categories.category_name";
          $result = mysqli_query($con,$sql);
            
           // $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

           // print_r($rows);
        ?>

        <?php
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) 
                  {
                    if($i==0)
                    {
                      ?>
                      <a href="show_category.php?id=<?php echo $row['id']; ?>" class="list-group-item active" target="_blank"><?php echo $row['category_name']; ?></a>
                      <?php

                    }
                    else
                    {
                      ?>
                      <a href="show_category.php?id=<?php echo $row['id']; ?>" class="list-group-item" target="_blank"><?php echo $row['category_name']; ?></a>
                      <?php
                    }
                   ?>
                   

                   <?php

                   $i++;
                  }
                  ?>
           
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">

          

        <div id="shopping-cart">
          <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="cart_submit.php?action=empty">Empty Cart</a></div>
          <?php
          if(isset($_SESSION["cart_item"])){
              $item_total = 0;
          ?>  
          <table cellpadding="10" cellspacing="1">
          <tbody>
          <tr>
          <th style="text-align:left;"><strong>Name</strong></th>
          <th style="text-align:left;"><strong>Code</strong></th>
          <th style="text-align:right;"><strong>Quantity</strong></th>
          <th style="text-align:right;"><strong>Price</strong></th>
          <th style="text-align:center;"><strong>Action</strong></th>
          </tr> 
          <?php 


          print_r($_SESSION["cart_item"]);  
              foreach ($_SESSION["cart_item"] as $item){
              ?>
                  <tr>
                  <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["product_name"]; ?></strong></td>
                  <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["product_id"]; ?></td>
                  <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                  <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["product_price"]; ?></td>
                  <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cart_submit.php?action=remove&product_id=<?php echo $item["product_id"];?>" class="btnRemoveAction">Remove Item</a></td>
                  </tr>
                  <?php
                  $item_total += ($item["product_price"]*$item["quantity"]);
              }
              ?>

          <tr>
          <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
          </tr>
          </tbody>
          </table>    
            <?php
          }
          ?>
          </div>

        
          
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Reviews
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
