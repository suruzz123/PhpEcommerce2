<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($con,$sql);

     // print_r($result);
      
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


      
      //print_r($row);
      $active = $row['active'];
      $id = $row['id'];
      
      
     
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 &&  $active == 1) {
         //session_register("myusername");
         $_SESSION['login_id'] = $id;

         if($row['role_id']==1)
         {
            $_SESSION['user_type'] = 'admin';
            header("location: ../admin_panel");
         }
         else
         {
            $_SESSION['user_type'] = 'general';
            header("location: index.php");  
         }
         
         
      }else {
         //$error = "Your Login Name or Password is invalid";
         header("location: login.php");
      }
   }
?>