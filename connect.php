<?php


$db = mysqli_connect('localhost', 'root', '','ads');



//Output any connection error
if ($db->connect_errno) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}


?>

