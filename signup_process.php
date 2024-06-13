<?php
require 'connection.php';
session_start();

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM customer_table WHERE email = '$email'";
    $checkQueryResult = $connection->query($checkQuery);
    $checkQueryResultCount = $checkQueryResult->num_rows;

    if ($checkQueryResultCount > 0) {
        $_SESSION['msg'] = 'email already exists';
        header('location:signup.php');
    } else {
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO customer_table
        (`firstName`, `lastName`, `email`, `password`)
        VALUES
        ('$firstName', '$lastName', '$email', '$hashpassword')";


        $dbconnection = $connection->query($query);
        if ($dbconnection) {
            header('location:login.php');
        } else {
            $_SESSION['msg'] = 'Failed to execute!';
            header('location:signup.php');  
        }
    }
} else {
    header('location:signup.php');
}
