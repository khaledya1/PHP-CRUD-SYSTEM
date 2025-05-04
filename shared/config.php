<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "round30";

try{
$connect = mysqli_connect($host,$user,$password,$db_name);
}catch(Exception $e){
echo $e -> getMessage();
}

?>