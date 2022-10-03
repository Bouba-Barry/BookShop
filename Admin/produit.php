<?php require '../Models.php'; ?>
<?php

$produits = readAll("Livre");

?>
<base href="">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleTable.css">
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
    <title>Les Ouvrages presents dans le stock</title>
    <style>
        td img {
            width: 100px;
        }
    </style>
</head>



<body>
    <header><?php include_once("Navbar.php") ?></header>
    <div class="container">
        <h2>Liste des produits:</h2>
        <a class="btn btn-primary btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/addProduct.php">Ajouter</a>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Nom Livre</th>
                    <th scope="col" class="col-lg-4">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite</th>
                    <!-- <th scope="col">Categorie</th>
                <th scope="col">Auteur</th> -->
                    <th scope="col">Image</th>
                    <th scope="col">Editer/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit) : ?>
                    <tr>
                        <!-- <th scope="row"><--?php echo $produit['livre_id']; ?></th> -->
                        <td><?php echo $produit['livre_nom']; ?></td>
                        <td><?php echo $produit['livre_description']; ?></td>
                        <td><?php echo $produit['prix']; ?></td>
                        <td><?php echo $produit['quantite']; ?></td>
                        <td><img src="../Images/<?php echo $produit['livre_img']; ?>"></td>
                        <td>
                            <a class="btn btn-secondary btn-sm mb-2" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/editProduit.php?id=<?php echo $produit['livre_id']; ?>">Modifier</a>
                            <a class="btn btn-danger btn-sm mt-2" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/deleteProduit.php?id=<?php echo $produit['livre_id']; ?>">Supprimer</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>

    <?php
    if (isset($_GET['msgDelete']) && !empty($_GET['msgDelete'])) : ?>
        <p class="bg-light text-secondary text-center mt-5 fs-5 p-4"><?php echo $_GET["msgDelete"]; ?></p>
    <?php endif; ?>

    <?php
    if (isset($_GET['msgUpdate']) && !empty($_GET['msgUpdate'])) : ?>
        <p class="bg-light text-success text-center mt-5 fs-5 p-4"><?php echo $_GET["msgUpdate"]; ?></p>
    <?php endif; ?>
    <?php include_once("footerAdmin.php"); ?>
    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>

</html>