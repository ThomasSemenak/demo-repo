<?php
$host = 'mysqltry250.mysql.database.azure.com';
$username = 'admin505';
$password = '@Testing2';
$db_name = 'mysqltry250';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

echo "database connected";

//Close the connection
mysqli_close($conn);
?>