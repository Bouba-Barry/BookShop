<?php require '../Models.php'; ?>
<?php
$categories = readAll("Categorie");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Categories</title>
    <link rel="stylesheet" href="styleTable.css">
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
</head>
<style>
    .table-bordered {
        border-collapse: collapse !important;
    }
</style>

<body>
    <?php include_once("Navbar.php"); ?>
    <div class="container">
        <h2>Liste des Categories:</h2>
        <a class="btn btn-primary btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/addCategorie.php">Add Category</a>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Categorie</th>
                    <th scope="col">Editer/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) : ?>
                    <tr>
                        <th scope="row"><?php echo $categorie['categorie_id']; ?></th>
                        <td><?php echo $categorie['categorie_nom']; ?></td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/editCategorie.php?id=<?php echo $categorie['categorie_id']; ?>">Editer</a>
                            <a class="btn btn-danger btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/deleteCategorie.php?id=<?php echo $categorie['categorie_id']; ?>">Supprimer</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>

        <?php
        if (isset($_GET['msgInput']) && !empty($_GET['msgInput'])) : ?>
            <p class="bg-light text-primary text-center mt-5 fs-5 p-4"><?php echo $_GET["msgInput"]; ?></p>
        <?php endif; ?>

        <?php
        if (isset($_GET['msgUpdate']) && !empty($_GET['msgUpdate'])) : ?>
            <p class="bg-light text-primary text-center mt-5 fs-5 p-4"><?php echo $_GET["msgUpdate"]; ?></p>
        <?php endif; ?>

        <?php
        if (isset($_GET['msgDelete']) && !empty($_GET['msgDelete'])) : ?>
            <p class="bg-light text-danger text-center mt-5 fs-5 p-4"><?php echo $_GET["msgDelete"]; ?></p>
        <?php endif; ?>

    </div>

    <?php include_once("footerAdmin.php"); ?>

    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>

</html>