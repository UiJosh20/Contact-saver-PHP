<?php
require 'connection.php';
session_start();

$id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
$contact_name = $_POST['noteTitle'];
$phone_num = $_POST['note'];

    $checkQuery = "SELECT * FROM customer_table WHERE user_id = $id";
    $checkQueryResult = $connection->query($checkQuery);
    $checkQueryResultCount = $checkQueryResult->num_rows;
    if($checkQueryResultCount > 0){
        $query = "INSERT INTO `note_table` (`contact_name`, `phone_number`, `user_id`) VALUES ('$contact_name','$phone_num', $id)";
        $added = $connection->query($query);
        header("location:dashboard.php");
    }else{
        echo "error";
    }
}else{
    header("location:login.php");
}
?>