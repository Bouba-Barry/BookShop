<?php
require '../Models.php';
?>
<?php require_once '../ResizeImage.php'; ?>

<?php

use Imagine\Image\Box;
use Imagine\Image\Point;
?>
<?php
$resCategorie = readAll("Categorie");
$Auteur = readAll("Auteur");
$Livres = readAll("Livre");
?>
<?php
if (
    isset($_POST['nomLivre']) && isset($_POST['livre_desc']) && isset($_POST['auteur'])
    && isset($_POST['categorie']) && isset($_POST['quantite']) && isset($_POST['prix'])
) {
    $nom = htmlspecialchars($_POST['nomLivre']);
    $livre_desc = htmlspecialchars($_POST['livre_desc']);
    $prix = $_POST['prix'];
    $aut = $_POST['auteur'];
    $cate = $_POST['categorie'];
    $quantite = $_POST['quantite'];

    /**  Traitement du fichier uploader et le placer dans un dossier */
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 7000000) {
            // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['image']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
            if (in_array($extension, $allowedExtensions)) {
                // On peut valider le fichier et le stocker définitivement
                // move_uploaded_file($_FILES['image']['tmp_name'], '../Images/' . basename($_FILES['image']['name']));

                // Image::resize($_FILES['image']['tmp_name'], 340, 340, '../Images');
                // echo "L'envoi a bien été effectué !";
                // $imagine = new Imagine\Gd\Imagine();
                // $size = new Imagine\Image\Box(340, 340);
                $imgName = $_FILES['image']['tmp_name'];

                $dest = $_FILES['image']['name'];
                // var_dump($imgName);

                // $image = $imagine->open($imgName)->thumbnail($size, 'outbound')->save('../Images/' . $dest);
                // $nameImage = $dest.'_340.
                resize($imgName, '../Images/' . $dest);
            }
        }
    }
    $test = false;
    $quantite_livre = 0;
    foreach ($Livres as $livre) {
        if ($livre['livre_nom'] === strtoupper($nom)) {
            global $id;
            $id = $livre['livre_id'];
            $quantite_livre = $livre['quantite'];
            $test = true;
            break;
        }
    }
    $inc = $quantite + $quantite_livre;
    if ($test === true) {
        IncrementQuantity($id, $inc);
        echo "la quantite à eté augmenter avec succes !";
    } else {
        ajouterLivre($_POST, $dest);
        // echo "Produit ajouter avec success ";

        header('Location:produit.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <?php include_once("Navbar.php"); ?>
    <h2>Ajouter Un Produit</h2>
    <form class="form-control bordered" method="POST" action="" enctype="multipart/form-data">
        <fieldset>
            <div class="col-lg-3">
                <label for="nom">Nom Livre</label>
                <input type="text" name="nomLivre" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="quantite">Quantite</label>
                <input type="number" name="quantite" class="form-control">
            </div>

            <!-- <h4>Categorie et auteur</h4> -->
            <div class="form-group col-lg-3">
                <label for="Auteur">Auteur</label>
                <select id="Auteur" class="form-control" name="auteur" required>
                    <option selected>Choose...</option>
                    <?php foreach ($Auteur as $auteur) : ?>
                        <option value="<?php echo $auteur['auteur_id']; ?>">
                            <?php echo $auteur['auteur_nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label for="categorie">Categorie</label>
                <select id="categorie" name="categorie" class="form-control" required>
                    <option selected>Choose...</option>
                    <?php foreach ($resCategorie as $Categorie) : ?>
                        <option value="<?php echo $Categorie['categorie_id']; ?>">
                            <?php echo $Categorie['categorie_nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-3">
                <label for="Prix">Prix d'une unité</label>
                <input type="number" name="prix" id="prix" required class="form-control">
            </div>
            <div class="col-lg-5">
                <label for="desc">Description</label>
                <textarea class="form-control" id="desc" required name="livre_desc" maxlength="234" rows="3"></textarea>
            </div>
            <div class="col-lg-3">
                <label for="image">Couverture</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="importer une couverture">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </fieldset>
    </form>
    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>

</html>