<?php require '../Models.php'; ?>
<?php
$Auteurs = readAll("Auteur");
$testInput = false;
$msg = "";
if (isset($_POST['nom_aut']) && !empty($_POST['nom_aut'])) {
    $name = htmlspecialchars($_POST['nom_aut']);

    foreach ($Auteurs as $auteur) {
        if ($auteur['auteur_nom'] === strtoupper($name)) {
            $testInput = true;
            break;
        }
    }
    if ($testInput === true) {
        $msg = "L Auteur Existait déjà";
    } else if ($testInput === false) {
        ajouterAuteur(strtoupper($name));
        $msg = "L Auteur a été ajouter avec success !";
    }
    header("Location:Auteur.php?msgInput=$msg");
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
                <legend>Ajouter Un Auteur</legend>
                <div class="row">
                    <div class="col-lg-5">
                        <label for="nom">Nom de l'Auteur</label>
                        <input type="text" name="nom_aut" id="nom" class="form-control">
                    </div>
                    <div class="col-lg 5"> les Auteurs déjà Existants :
                        <?php foreach ($Auteurs as $auteur) : ?>
                            <h5> <?php echo $auteur['auteur_nom']; ?></h5>
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