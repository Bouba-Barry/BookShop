<?php session_start(); ?>
<?php
require_once '../Models.php';
?>
<?php
if (isset($_SESSION['idUser'])) {
    $user = SelectUserById($_SESSION['idUser']);
    if (isset($_POST['name']) && isset($_POST['login'])) {
        EditUserProfile($_POST, $_SESSION['idUser']);
    }
?>
    <?php
    $lien = "http://localhost/FormationIRISI/Projet-eCommerce/App/";
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
            background: rgb(99, 39, 120)
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
        <footer> <?php include_once("../Front/myHeader.php"); ?> </footer>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $user['user_nom'] ?></span><span class="text-black-50"><?php echo $user['user_login']; ?></span><span><a class="btn btn-danger btn-md" href="<?php echo $lien ?>logout.php">Deconnexion</a> </span></div>

                </div>
                <div class="col-md-5 border-right">
                    <form action="" method="POST">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Vos Informations Personnelles</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="first name" value="<?php echo $user['user_nom']; ?>"></div>
                                <div class="col-md-6"><label class="labels">Login</label><input type="text" class="form-control" name="login" value="<?php echo $user['user_login']; ?>" placeholder="Your login"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="tel" class="form-control" placeholder="phone number" value="<?php echo $user['user_tel']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text" name="adresse" class="form-control" placeholder="Adresse" value="<?php echo $user['user_adresse']; ?>"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary btn-md profile-button" type="submit">Modifier Profile</button></div>
                    </form>

                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Historique de Vos Commandes </span><span class="border px-3 p-1 add-experience"></div><br>
                    <div class="col-md-12"><label class="labels">DATE </label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Montant Payer</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php } ?>