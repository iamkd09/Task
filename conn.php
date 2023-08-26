<?php

$server_name = '127.0.0.1';
$user_name = 'root';
$password = '1234';
$database_name = 'salon';

$db = mysqli_connect($server_name,$user_name,$password,$database_name);

if(!$db){
    die('connection failed'.mysqli_connect_error());
}

?>