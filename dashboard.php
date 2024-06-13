<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section class="p-5 bg-black vh-100">
        <form action="note_process.php" method="post" class="w-50 mx-auto px-2 py-3 bg-light rounded shadow">
            <label for="" class="form-label">Contact Name</label>
            <input type="text" name="noteTitle" placeholder="Name" class="form-control" autofocus required>
            <label for="" class="form-label">Phone number</label>
            <input type="number" name="note" class="form-control" id="" placeholder="phone number" required></input>

            <input type="submit" name="submit" value="Add contact" class="btn btn-success w-100 my-3">
        </form>

        <?php
        session_start();
        if (isset($_SESSION['success'])) {
            echo '<div class="text-success text-center py-3">' . $_SESSION['success'] . "</div>";
        }
        unset($_SESSION['success']);
        ?>
    </section>
</body>

</html>