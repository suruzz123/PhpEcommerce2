<?php 
class Auth
{
    private $host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "lict_h35";
    private $con;
    function __construct()
    {
       $this->con =  mysqli_connect($this->host, $this->db_user, $this->db_pass, $this->db_name);
       //echo "string";
    }
    function login($username, $password)
    {
     $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($this->con,$sql);
     // print_r($result);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //print_r($row);
      $active = $row['active'];
      $id = $row['id'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1 &&  $active == 1) 
	  {
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
      }
	  else {
         //$error = "Your Login Name or Password is invalid";
         header("location: login.php");
      }
    }
    function __destruct(){
        mysqli_close($this->con);
       // echo "<br/>";
       // echo "string end";
    }
}
    $obj = new Auth();

    $obj->login("Toy", 'Passw0rd');
 ?>