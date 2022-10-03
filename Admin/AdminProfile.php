<?php

require_once '../Models.php';


$admin = SelectAdminById($idAdmin);
var_dump($admin);
?>
<?php
$lien = "http://localhost/FormationIRISI/Projet-eCommerce/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <title>Profile</title>
</head>
<style>
    body {
        background: rgb(99, 39, 47)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>

<body>
    <div class="container rounded bg-white mt-2 mb-2">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="images/photo_Dv.jpg"><span class="font-weight-bold"><?php echo $admin['admin_nom'] ?></span><span class="text-black-50"><?php echo $admin['admin_login']; ?></span><span><a class="btn btn-danger btn-md" href="<?php echo $lien ?>App/logout.php">Deconnexion</a></span></div>

            </div>
            <div class="col-md-5 border-right-danger">

                <h4>Nom: <?php echo $admin['admin_nom']; ?></h4>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>