<?php session_start(); ?>
<?php require '../Models.php'; ?>
<?php
$admins = readAll("Admin");
$users = readAll("User");
$test = false;
?>

<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];


    foreach ($admins as $admin) {
        if ($admin['admin_login'] === $login && $admin['admin_password'] === $password) {
            $test = true;
            $_SESSION['username'] = 'Adminlogged';
            // header('Location: ../Admin/Account.php?msgLogin=Connection Reussie');
            header('Location: ../Admin/index.php');
            $_SESSION['idAdmin'] = $admin['admin_id'];
            exit();
        }
    }

    foreach ($users as $user) {
        if ($user['user_login'] === $login && $user['user_password'] === $password) {
            $test = true;
            $_SESSION['username'] = 'Userlogged';
            $_SESSION['idUser'] = $user['user_id'];
            header('Location: User.php?msgLogin=Connection Reussie');
            exit();
        }
    }
    if ($test === false) {
        header("Location:login.php?msgError=Identifiant Incorrect");
        $_SESSION['login'] = $login;
        exit();
    }
}
?>