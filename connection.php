<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database='bank_db';

$connection = new mysqli($host,$user,$password,$database);
if ($connection->connect_error){
    echo 'Not connected'.$connection->connect_error;
}else{
    echo 'Connected ';
}





?>