<?php
session_start();
require_once '../Models.php'; ?>

<?php

// // chemin d'accès à votre fichier JSON
// $url = "http://localhost/FormationIRISI/Projet-eCommerce/App/PaypalPayment.php";
// // mettre le contenu du fichier dans une variable
// $data = file_get_contents($url);
// // décoder le flux JSON
// $obj = json_decode($data, true);

// var_dump($obj);

// $str_json = file_get_contents('php://str_json');

// var_dump($str_json);

// var_dump($_COOKIE);

if ($_COOKIE) {
    if ($_COOKIE['status'] === "COMPLETED") {
        ajouterPayment($_COOKIE);
?>
        <?php
        foreach ($_SESSION['panier']['livre_id'] as $key) {

            updateArticle($key, $_SESSION['panier']['quantite'][$key]);
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gestion Categories</title>
            <link rel="stylesheet" href="../Admin/styleTable.css">
            <link rel="stylesheet" href="../Front/style/bootstrap.css">
        </head>
        <style>
            .table-bordered {
                border-collapse: collapse !important;
            }
        </style>

        <body>
            <header class="mb-5"> <?php include_once("../Front/myHeader.php"); ?></header>
            <!-- <php include_once("Navbar.php"); ?> -->
            <div class="container mt-5">
                <h2 class="bg-light text-primary text-center mt-3 fs-5 p-4">Information Relative à votre payment :</h2>
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id payment</th>
                            <th scope="col">Nom Payer</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Status</th>
                            <th scope="col">Email Payer </th>
                            <th scope="col">Date Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $_COOKIE['payer_id']; ?></th>
                            <td><?php echo $_COOKIE['nomPayer']; ?></td>
                            <td><?php echo $_COOKIE['montant'] . ' ' . $_COOKIE['devise']; ?></td>
                            <td><?php echo $_COOKIE['status']; ?></td>
                            <td><?php echo $_COOKIE['email']; ?></td>
                            <td><?php echo $_COOKIE['date_pay']; ?></td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <script src="../Front/script/bootstrap.bundle.js"></script>
        </body>

        </html>
    <?php
    } else { ?>
        <p class="bg-light text-danger text-center mt-5 fs-7 p-4"> Veillez Réssayer Votre Payment ! </p>
<?php
    }
}
?>