<?php

$host="mysqltry250.mysql.database.azure.com";
$user="admin505";
$password="@Testing2";
$database="mysqltry250";

$connect=mysqli_connect($host,$user,$password,$database);

if(!$connect){
    die("failed to connect with databse!".mysqli_connect_error());
}
    

echo "database connected";
mysqli_close($connect);

?>