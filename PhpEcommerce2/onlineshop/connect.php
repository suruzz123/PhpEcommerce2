<?php

$hostname = "localhost";

$username = "root";
$passward = "";
$db_name = "lict_h35";

$con = mysqli_connect($hostname, $username, $passward, $db_name);
//$con = new mysqli($hostname, $username, $passward, $db_name);


if (!$con) {
	//echo "Database connection failed".mysql_error();
}
else {
	//echo "Successfully Connected";
}





?>