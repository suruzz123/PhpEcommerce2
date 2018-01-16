<?php 
session_start();

require_once("../classes/dbcontroller.php");
$db_handle = new DBController();

$keyword = $_REQUEST['keyword'];

?>

<?php include("connect.php"); ?>




<?php


//SELECT * FROM `products` WHERE `product_name` LIKE '%.$keyword.%'

        $keyword_lr = '%'.$keyword.'%';
        $keyword_l = '%'.$keyword;
        $keyword_r = $keyword.'%';

        $sql = "SELECT products.*, categories.category_name FROM products INNER JOIN categories on products.product_category=categories.id WHERE (products.product_name LIKE '$keyword_lr' OR categories.category_name LIKE '$keyword_lr') AND product_status =1 ORDER BY product_name ASC";

          $product_array = $db_handle->runQuery($sql);
          if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
          ?>

            
            <div class="col-lg-4 col-md-6 mb-4">
                  <form method="post" action="cart_submit.php?action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top image-responsive" src="../uploads/<?php echo $product_array[$key]["product_image"]; ?>" alt=""></a>
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