<?php
require '../Models.php';
require_once '../ResizeImage.php';
?>
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    // echo $_GET['id'];
    // $produit = findById($_GET['id'], "Livre");
    $produit = selectById($_GET['id']);
    // var_dump($produit);
    $idAuteur = $produit['id_Auteur'];
    // $auteur = findById($idAuteur, "Auteur");
    $auteur = selectAutById($idAuteur);


    $idcategorie = $produit['id_categorie'];
    // $categorie = findById($idcategorie, "Categorie");
    $categorie = selectCatById($idcategorie);

    $Categories = readAll("Categorie");
    $Auteurs = readAll("Auteur");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Front/style/bootstrap.css">
        <title>Modification Livre</title>
    </head>

    <body>
        <?php include_once("Navbar.php"); ?>
        <h2>Modifier Un Livre</h2>
        <form class="form-control bordered" method="POST" action="" enctype="multipart/form-data">
            <fieldset>
                <div class="col-lg-3">
                    <label for="nom">Nom Livre</label>
                    <input type="text" name="nomLivre" value="<?php echo $produit['livre_nom']; ?>" class="form-control">
                </div>
                <div class="col-lg-3">
                    <label for="quantite">Quantite</label>
                    <input type="number" name="quantite" value="<?php echo $produit['quantite']; ?>" class="form-control">
                </div>

                <!-- <h4>Categorie et auteur</h4> -->
                <div class="form-group col-lg-3">
                    <label for="Auteur">Auteur</label>
                    <select id="Auteur" class="form-control" name="auteur">

                        <option value="<?php echo $auteur['auteur_id']; ?>" selected><?php echo $auteur['auteur_nom']; ?></option>
                        <?php foreach ($Auteurs as $auteur) : ?>
                            <option value="<?php echo $auteur['auteur_id']; ?>">
                                <?php echo $auteur['auteur_nom']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="categorie">Categorie</label>
                    <select id="categorie" name="categorie" class="form-control">
                        <option value="<?php echo $categorie['categorie_id']; ?>" selected><?php echo $categorie['categorie_nom']; ?></option>
                        <?php foreach ($Categories as $Categorie) : ?>
                            <option value="<?php echo $Categorie['categorie_id']; ?>">
                                <?php echo $Categorie['categorie_nom']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-lg-3">
                    <label for="Prix">Prix d'une unité</label>
                    <input type="number" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" class="form-control">
                </div>
                <div class="col-lg-5">
                    <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" name="livre_desc" rows="3"><?php echo $produit['livre_description']; ?></textarea>
                </div>
                <div class="col-lg-3">
                    <label for="image">Couverture</label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="importer une couverture">
                </div>


                <button type="submit" class="btn btn-primary">Modifier</button>
            </fieldset>
        </form>
        <?php include_once("footerAdmin.php"); ?>
        <script src="../Front/script/bootstrap.bundle.js"></script>
    </body>

    </html>
<?php } ?>

<?php
if (
    isset($_POST['nomLivre']) && isset($_POST['livre_desc']) && isset($_POST['auteur'])
    && isset($_POST['categorie']) && isset($_POST['quantite']) && isset($_POST['prix'])
) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 7000000) {
            // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['image']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
            if (in_array($extension, $allowedExtensions)) {
                // On peut valider le fichier et le stocker définitivement
                $imgName = $_FILES['image']['tmp_name'];

                $dest = $_FILES['image']['name'];
                resize($imgName, '../Images/' . $dest);
                updateLivre($_POST, $dest, $_GET['id']);
            }
        }
    } else {
        updateLivreSansImage($_POST, $_GET['id']);
    }

    // header('Location:produit.php?msgUpdate=Livre ' . $_GET['id'] . ' Modifier avec succes');
}
?>