<?php
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["myfile"]["name"]);

move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)
?>