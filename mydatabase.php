<?php 

$servername = "localhost";
$username = "root";
$password = "";

$connection = mysqli_connect ($servername, $username, $password );

if(!$connection){
    die("failed commection" . mysqli_connect_errno());
}

echo "connected successfully! Welcome"

?>