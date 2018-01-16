
<!DOCTYPE html>
<html>
<body>

<?php
function myTest() {
    static $x = 0;
    echo $x;
    $x++; // $x = $x + 1;
}


function myTest2() {
    static $x = 0;
    echo $x;
    $x++; // $x = $x + 1;
}

myTest();
echo "<br>";
myTest();
echo "<br>";
myTest();
?> 

</body>
</html>