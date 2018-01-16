<?php

$email= "";
$password = "";
$name = "";

// echo $_SERVER["REQUEST_METHOD"];

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];

}

else
{	
	echo "Error Out side form";
	echo "<br/>";
}


echo $email;
echo "<br/>";
echo $password;
echo "<br/>";
echo $name;
echo "<br/>";
?> 


