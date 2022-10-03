<?php session_start(); ?>
<?php
if (array_key_exists('username', $_SESSION)) {
    if ($_SESSION['username'] === 'Adminlogged') {
        global $idAdmin;
        $idAdmin = $_SESSION['idAdmin'];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Front/style/bootstrap.css">
            <link rel="stylesheet" href="style.css">
            <style>
                section {
                    color: #4a4548;
                }
            </style>
            <title>Gestion du site</title>
        </head>

        <body>
            <!--  header start  -->
            <header>
                <?php include_once('Navbar.php'); ?>
            </header>

            <section class="container">
                <h1>Gestion du site</h1>

            </section>
            <main><?php include_once("AdminProfile.php"); ?></main>

            <footer>

            </footer>


            <!--?php include_once('footerAdmin.php'); ?-->

            <script src="../Front/script/bootstrap.bundle.js"></script>

        </body>

        </html>
<?php }
} else {
    session_unset();
    session_destroy();
    header("Location: ../App/login.php");
}
?>