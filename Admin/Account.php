<?php session_start(); ?>

<?php if ($_SESSION['username']) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Front/style/bootstrap.css">
        <title>Profile</title>
    </head>

    <body>
        <div class="container-sm">

            <h3>Votre Profile</h3>

            <div class="text-center mt-3">
                <a href="../App/logout.php" class="btn btn-danger">Logout</a>
                <a href="../home.php" class="btn btn-primary">Home</a>
            </div>


        </div>
        <script src="../Front/script/bootstrap.bundle.js"></script>
    </body>

    </html>

<?php } else {
    header("Location: ../App/logout.php");
} ?>