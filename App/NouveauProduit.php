<?php
// session_start();
require '../Models.php'; ?>
<?php
$newBooks = SelectNew();
// var_dump($newBooks);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Produis </title>
    <!--Pour les slides caoursel-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header> <?php include_once("../Front/myHeader.php"); ?> </header>
    <div class="container">
        <h1>Les livres Ajoutés Recemment</h1>
        <main class="grid">
            <?php foreach ($newBooks as $book) : ?>
                <article>
                    <img src="../Images/<?php echo $book['livre_img']; ?>">
                    <div class="text">

                        <p><?php echo substr($book['livre_description'], 0, 100); ?>...</p>
                        <button><?php echo $book['prix']; ?> dhs</button>
                        <button type="button" class="btn btn-sm btn-primary" id="livre_1" onclick="ajouter(<?php echo $book['livre_id']; ?>,'<?php echo $book['livre_nom']; ?>',<?php echo $book['prix']; ?>)">Ajouter au panier</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
</body>
<script src="../Front/panier.js"></script>

</html>