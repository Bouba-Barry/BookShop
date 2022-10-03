<?php require '../Models.php'; ?>
<?php
$auteurs = readAll("Auteur");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Auteurs</title>
    <link rel="stylesheet" href="styleTable.css">
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
</head>

<body>
    <header><?php include_once('Navbar.php'); ?></header>
    <div class="container">
        <h2>Liste des Auteurs:</h2>
        <a class="btn btn-primary btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/addAuteur.php">Ajouter Auteur</a>

        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Auteur</th>
                    <th scope="col">Modifier/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($auteurs as $auteur) : ?>
                    <tr>
                        <th scope="row"><?php echo $auteur['auteur_id']; ?></th>
                        <td><?php echo $auteur['auteur_nom']; ?></td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/editAuteur.php?id=<?php echo $auteur['auteur_id']; ?>">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/deleteAuteur.php?id=<?php echo $auteur['auteur_id']; ?>">Supprimer</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>

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
        <p class="bg-light text-primary text-center mt-5 fs-5 p-4"><?php echo $_GET["msgDelete"]; ?></p>
    <?php endif; ?>

    <?php include_once("footerAdmin.php"); ?>

    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>

</html>