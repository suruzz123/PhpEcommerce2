<?php
// Start the session
session_start();

// Set session variables
$_SESSION["username"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";

?>