<?php require '../Models.php'; ?>
<?php
$Categories = readAll("Categorie");
$testInput = false;
$msg = "";
if (isset($_POST['nom_cat']) && !empty($_POST['nom_cat'])) {
    $name = htmlspecialchars($_POST['nom_cat']);

    foreach ($Categories as $categorie) {
        if ($categorie['categorie_nom'] === strtoupper($name)) {
            $testInput = true;
            break;
        }
    }
    if ($testInput === true) {
        $msg = "La Categorie Existait déjà";
    } else if ($testInput === false) {
        ajouterCategorie(strtoupper($name));
        $msg = "La Categorie a été ajouter avec success !";
    }
    header("Location:Categorie.php?msgInput=$msg");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Front/style/bootstrap.css">
    <style>
        input {
            border: 1px solid black in !important;
            border-radius: 5px !important;
        }

        button {
            margin-top: 5px;
        }

        #bloc {
            display: flex !important;
            flex-direction: column !important;
        }
    </style>
</head>

<body>
    <?php include_once("Navbar.php"); ?>
    <div class="container">
        <form action="" method="Post" class="form-control">
            <fieldset>
                <legend>Ajouter Une Categorie</legend>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="nom">Nom de la categorie</label>
                        <input type="text" name="nom_cat" id="nom" class="form-control">
                    </div>
                    <div class="col-lg 5"> les categories existante :
                        <?php foreach ($Categories as $categorie) : ?>
                            <h5> <?php echo $categorie['categorie_nom']; ?></h5>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
            </fieldset>
        </form>
    </div>
    <script src="../Front/script/bootstrap.bundle.js"></script>
</body>

</html>