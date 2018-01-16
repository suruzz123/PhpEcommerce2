
<!DOCTYPE html>
<html>
<body>

<?php

$x = 20;
$y = 25;

function addNumber($a, $b) {
 	
 	$z = $a + $b;
 	return $z;
}

function subNumber($a, $b) {
 	
 	$z = $a - $b;
 	return $z;
}

$res = addNumber($x, $y);
echo $res;
echo "<br/>";


$res_sub = subNumber($x, $y);
echo $res_sub;

?>

</body>
</html>