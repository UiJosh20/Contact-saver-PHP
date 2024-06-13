<?php
require 'connection.php';
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customer_table WHERE email='$email'";
    $dbcon = $connection->query($sql);
    if ($dbcon->num_rows > 0) {
        $user = $dbcon->fetch_assoc();
        $hashedpassword = $user['password'];
        $passVerify = password_verify($password, $hashedpassword);
        if ($passVerify) {
            $_SESSION['user_id'] = $user['user_id'];
            header('location:dashboard.php');
        } else {
            echo 'invalid credentials';
        }
    } else {
        echo 'invalid credentials';
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-black">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="login" id="login" method="post" class="py-5 w-50 mx-auto">

        <input type="email" name='email' placeholder="Email Address" class="form-control my-3" required autofocus>
        <input type="password" name='password' placeholder="Password" class="form-control my-3" required>
        <input type="submit" name="submit" value="Login" class="w-100 btn btn-primary my-3">
    </form>

    <?php
    session_start();
    if (isset($_SESSION['msg'])) {
        echo '<div class="text-danger text-center py-3">' . $_SESSION['msg'] . "</div>";
    }
    unset($_SESSION['msg']);
    ?>
</body>

</html>