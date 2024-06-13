<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black">

    <form action="signup_process.php" method="post" class="py-5 w-50 mx-auto">
        <input type="text" name='firstName' placeholder="First Name" class="form-control my-3" autofocus>
        <input type="text" name='lastName' placeholder="Last Name" class="form-control my-3">
        <input type="email" name='email' placeholder="Email Address" class="form-control my-3">
        <input type="password" name='password' placeholder="Password" class="form-control my-3">
        <input type="submit" name="submit" value="signup" class="w-100 btn btn-primary my-3">
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