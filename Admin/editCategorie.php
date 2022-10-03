<?php require '../Models.php'; ?>
<?php $Categories = readAll("Categorie"); ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    global $idcat;
    $idcat = $_GET['id'];
    $categorie = selectCatById($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Livre</title>
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
</head>

<body>
    <?php include_once("Navbar.php"); ?>
    <div class="container">
        <form action="" method="POST" class="form-control">
            <fieldset>
                <legend>Editer Une Categorie</legend>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="nom">Nom de la categorie</label>
                        <input type="text" value="<?php echo $categorie['categorie_nom']; ?>" name="nom_cat" id="nom" class="form-control">
                    </div>
                    <div class="col-lg 5"> les categories existante :
                        <?php foreach ($Categories as $categorie) : ?>
                            <h5> <?php echo $categorie['categorie_nom']; ?></h5>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
            </fieldset>
        </form>
    </div>
    <?php include_once("footerAdmin.php"); ?>
    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>
<?php
if (isset($_POST['nom_cat']) && !empty($_POST['nom_cat'])) {

    // if (preg_match("[a-zA-Z]", $_POST['nom_cat']))

    updateCategorie($idcat, strtoupper($_POST['nom_cat']));

    header('Location: Categorie.php?msgUpdate=Categorie avec id' . $_GET['id'] . ' Modifier avec succes');
    exit();
}
?>

</html>