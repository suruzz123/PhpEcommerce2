<?php include("connect.php"); ?>


<?php 

require_once("../classes/dbcontroller.php");
$db_handle = new DBController();


$keyword = "";

if(isset($_REQUEST['keyword'])){
  $keyword = $_REQUEST['keyword'];
}

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>


      <link href="../admin_panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


      <style type="text/css">
        
        .img_product{
          
          
          width: auto;
          max-height: 100px;

        }
      </style>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script>
        function search_product()
        {

             //alert("OK");
            var keyword = $("#search_keyword").val();
            if(keyword =='')
            {
               return false; 
            }
            else
            {
            
             $.ajax({
                    method: "get",
                    url: 'search_product.php',
                    data: {keyword: keyword}
                })
                .done(function (response)
                {

                    if(response !=0)
                    {
                      $("#product_content").html(response);
                    }
                    else
                    {
                       $("#product_content").html(response);
                    }

                    //alert(response);
                    //$("#category_list").html(response);
                });
            }    
            
         }
       </script>

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

            <li class="nav-item">
              <form class="form-inline my-2 my-lg-0 mr-lg-2">
                <div class="input-group">
                  <input class="form-control" id="search_keyword" name="search_keyword" type="text" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="search_product()">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
            </li>

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

          <div class="row" id="product_content">

          

        <?php
        $sql = "SELECT products.*, categories.category_name FROM products INNER JOIN categories on products.product_category=categories.id WHERE product_status =1 ORDER BY product_name ASC";
        


          $product_array = $db_handle->runQuery($sql);
          if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
          ?>

            
            <div class="col-lg-4 col-md-6 mb-4">
                  <form method="post" action="cart_submit.php?action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top img_product" src="../<?php echo $product_array[$key]["product_image"]; ?>" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="product_detail.php?id=<?php echo $product_array[$key]["product_category"]; ?>&pid=<?php echo $product_array[$key]["product_id"]; ?>"><?php echo $product_array[$key]["product_name"]; ?></a>
                        </h4>
                        <h5>$<?php echo $product_array[$key]["product_price"]; ?></h5>
                        <p class="card-text"><?php echo $product_array[$key]["category_name"]; ?></p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        <input type="text" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to cart" class="btn btn-warning" />
                      </div>
                    </div>
                  </form>
                  </div>





           
          <?php
              }
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
