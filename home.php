<?php session_start(); ?>
<?php
if (array_key_exists('username', $_SESSION)) {
    if ($_SESSION['username'] === 'Adminlogged') {
        header('Location: Admin/index.php');
        exit();
    }
}
// } else {
//     // session_unset();
//     // session_destroy();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Get Your Book</title>
</head>
<style>
</style>

<body>
    <!-- <header>
        ?php include_once('Front/myHeader.php'); ?
    </header>

    <section>
        !-- ?php include_once('App/sectionDefilante.php'); ?> --
        ?php include_once('Front/mySlider.php'); ?

    /section -->
    <section><?php include_once("Front/enteteIndex.php"); ?></section>

    <section>
        <?php include_once('Front/home_page1.php'); ?>
    </section>

    <!-- <footer>
        <--?php include_once('pagination.php'); ?--
    </footer>-->

    <script src="Front/script/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>