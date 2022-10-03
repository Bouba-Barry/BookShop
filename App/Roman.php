<?php
require_once '../Models.php'; ?>

<?php

$livres = findLivreByCatName("Roman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROMAN ET Les Adaptations au Cinema</title>
</head>
<style>
    body {
        background-color: aliceblue;
    }

    .container {
        border: 1px solid black;
        border-radius: 5px;
        padding: 5px;
    }

    .container h1 {
        opacity: 0.5;
        border-bottom: 2px solid black;
        background-color: blueviolet;
    }

    .grid {
        height: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* grid-template-columns: 200px 200px 200px; */
        grid-gap: 30px;
        align-items: center;
        margin-top: 15px;
    }

    .grid>article {
        background: #eee5ef;
        border: none;
        box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
        border-radius: 20px;
        text-align: center;
        width: 250px;
        transition: transorm .3s;
        /* cursor: pointer; */
    }

    .grid>article:hover {
        transform: translateY(5px);
        box-shadow: 2px 2px 26px 0px rgba(0, 0, 0, 0.3);
    }

    .grid>article img {
        width: 100%;
        height: 50%;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;

    }

    .text {
        padding: 0 20px 20px;

    }

    .text p {
        font-size: 0.6rem;
    }

    .text h3 {
        text-transform: uppercase;
    }

    .text button {
        background: lightblue;
        border-radius: 20px;
        width: 120px;
        border: none;
        margin-bottom: 5px;
    }

    @media (max-width:1024px) {
        .grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width:768px) {
        .grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 500px) {
        .grid {
            grid-template-columns: repeat(1, 1fr);
        }

        .grid>article {
            text-align: center;
        }
    }
</style>

<body>

    <header> <?php include_once("../Front/myHeader.php"); ?> </header>
    <div class="container">
        <h1>Les ROMANS DISPONIBLES</h1>
        <main class="grid">
            <?php foreach ($livres as $book) : ?>
                <article>
                    <img src="../Images/<?php echo $book['livre_img']; ?>">
                    <div class="text">

                        <p><?php echo $book['livre_nom']; ?></p>
                        <button>Prix: <?php echo $book['prix']; ?> dhs</button>
                        <button type="button" class="btn btn-sm btn-primary" id="livre_1" onclick="ajouter(<?php echo $book['livre_id']; ?>,'<?php echo $book['livre_nom']; ?>',<?php echo $book['prix']; ?>)">Ajouter au panier</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
    <footer>
        <?php include_once("footer.php"); ?>
    </footer>

    <script src="../Front/panier.js"></script>
</body>

</html>