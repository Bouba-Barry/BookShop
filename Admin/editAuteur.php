<?php require '../Models.php'; ?>
<?php $auteurs = readAll("Auteur"); ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    global $idaut;
    $idaut = $_GET['id'];
    $auteur = selectAutById($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Auteur</title>
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
</head>

<body>
    <?php include_once("Navbar.php"); ?>
    <div class="container">
        <form action="" method="POST" class="form-control">
            <fieldset>
                <legend>Editer Une Auteur</legend>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="nom">Nom de l'Auteur</label>
                        <input type="text" value="<?php echo $auteur['auteur_nom']; ?>" name="nom_aut" id="nom" class="form-control">
                    </div>
                    <div class="col-lg 5"> les Auteurs existants déjà:
                        <?php foreach ($auteurs as $auteur) : ?>
                            <h5> <?php echo $auteur['auteur_nom']; ?></h5>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
            </fieldset>
        </form>
    </div>

    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>
<?php
if (isset($_POST['nom_aut']) && !empty($_POST['nom_aut'])) {

    // if (preg_match("[a-zA-Z]", $_POST['nom_cat']))

    updateAuteur($idaut, strtoupper($_POST['nom_aut']));

    header('Location: Auteur.php?msgUpdate=Auteur avec id' . $_GET['id'] . ' Modifier avec succes');
    exit();
}
?>

</html>