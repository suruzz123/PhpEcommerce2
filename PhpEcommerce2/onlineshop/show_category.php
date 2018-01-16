<?php include("connect.php"); ?>

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


            $product_category = $_GET['id'];

          $sql = "SELECT categories.* FROM categories LEFT JOIN products on products.product_category=categories.id WHERE products.product_status =1  GROUP BY products.product_category ORDER BY categories.category_name";
          $result = mysqli_query($con,$sql);
            
           // $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

           // print_r($rows);
        ?>

        <?php
                //$i = 0;
                while($row = mysqli_fetch_assoc($result)) 
                  {
                    if($product_category==$row['id'])
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

                   //$i++;
                  }
                  ?>
           
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

           <?php

          $sql = "SELECT products.*, categories.category_name FROM products INNER JOIN categories on products.product_category=categories.id WHERE product_status =1 AND products.product_category='$product_category' ORDER BY product_name DESC";
          $result = mysqli_query($con,$sql);
            
           // $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

           // print_r($rows);
        ?>

        <?php
                while($row = mysqli_fetch_assoc($result)) 
                  {
                   ?>

                <div class="card mt-4">
                  <img class="card-img-top img-fluid" src="../<?php echo $row['product_image']; ?>" alt="">
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $row['product_name']; ?></h3>
                    <h4>$<?php echo $row['product_price']; ?></h4>
                    <!-- <p class="card-text">
                      <?php //echo $row['product_details']; ?>
                    </p> -->


                    <a href="product_detail.php?id=<?php echo $row['product_category']; ?>&pid=<?php echo $row['product_id']; ?>" target="_blank">
                        
                        Details
                      </a>

                    <p class="card-text">
                      <a href="#" target="_blank">
                        More product on <?php echo $row['category_name']; ?>
                      </a>
                    </p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars
                  </div>
                </div>
                  
                   <?php
                   }
                   ?>



          
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
