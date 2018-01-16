<?php 

/**
* 
*/
class Auth
{
	private $host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "suruzzaman";
	private $con;

	
	function __construct()
	{
		$this->con = mysql_connect($this->host, $this->db_user, $this->db_pass, $this->db_name);
	}
	function login ($username, $password)
	{
		$query = "SELECT * FROM suruzzamans WHERE username = '$username' AND password = '$password'";
		$res = mysql_query($this->con, $query);
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$active = $row['active'];
		$id = $row['id'];
		$count = mysqli_num_rows($res);
		if ($count == 1 && $active == 1) 
		{
			$_SESSION['login_id'] = $id;
			if ($row['role_id'] == 1) 
			{
				$_SESSION['user_type'] = 'admin';
				header('location: admin.php');
			}
			else
			{
				$_SESSION['user_type'] = 'general';
				header('location: index.php');
			}
		}
		else
		{
				header('location: login.php');
		}
	}
	function __destruct()
	{
		mysql_close($this->con);
	}
}
$obj = new Auth();
$obj->login('Toy', 'Passw0rd');



 ?>