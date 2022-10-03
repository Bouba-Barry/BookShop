 <?php

    if (isset($_GET['q'])) {

        require_once '../db_connexion/connect_db.php';

        $db = connectez();

        $q = addslashes(strtoupper($_GET['q']));

        // gerons le cas des espaces

        $s = explode(" ", $q);

        $sql = "SELECT * FROM Livre"; //WHERE livre_nom like  ";

        $i = 0;
        foreach ($s as $mot) {
            if ($i === 0) {
                $sql .= " WHERE ";
            } else {
                $sql .= " OR ";
            }
            $sql .= "  livre_nom like '%$mot%' ";
            $i++;
        }
        // echo $sql;
        $req = $db->prepare($sql);
        $req->execute();
        $resultats = $req->fetchAll();
        // try {
        //     $res = $resultats->rowCount() . " Résultats Trouvé";
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        // $perPage = 4;
        // $nbreLivre = nbreLivre();
        // $nbrePages = ceil($nbreLivre / $perPage);
        // global $currentPage;
        // if (isset($_GET['p']) && $_GET['p'] >= 1 && $_GET['p'] <= $nbrePages) {
        //     $currentPage = $_GET['p'];
        // } else {
        //     $currentPage = 1;
        // }
        // $offset = $perPage * ($currentPage - 1);
        // $livres = EltPage($offset, $perPage);

        $lienPage = "http://localhost/FormationIRISI/Projet-eCommerce/";
    ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <style>
             .card-text {
                 display: none;
             }

             .card-text:hover {
                 display: inline-block;
             }
         </style>
         <!-- CSS only -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

     </head>

     <body>
         <header><?php include_once("myHeader.php"); ?></header>
         <main>
             <div class="album py-5 bg-light">
                 <div class="container">

                     <div class="d-flex justify-content-center mb-3 mt-2">
                         <h4 class="text-center">Resultat de Votre recherche </h4>
                     </div>

                     <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                         <?php foreach ($resultats as $livre) : ?>
                             <div class="col">
                                 <div class="card shadow-sm">
                                     <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg10 role=" 10mg" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                         <title>Placeholder</title>
                                         <rect width="100%" height="100%" fill="#55595c" /><text x="100%" y="100%" fill="#eceeef" dy=".3em"><img src="../Images/<?php echo $livre['livre_img']; ?>" alt="image de livre" class="img_flottant"></text>
                                     </svg>
                                     <!-- substr($livre['livre_description'], 0, 100); -->
                                     <div class="card-body">
                                         <h7><?php echo $livre['livre_nom']; ?></h7>
                                         <!-- <p class="card-text" style="font-size:0.8rem;">?php echo $livre['livre_nom']; ?></p> -->
                                         <div class="d-flex justify-content-between align-items-center">
                                             <div class="btn-group">
                                                 <button type="button" class="btn btn-outline-warning text-muted"><?php echo number_format($livre['prix'], 2, ',', ' '); ?> $</button>

                                             </div>
                                             <small class="text-muted">
                                                 <!-- <button type="button" class="btn btn-sm btn-primary" id="livre_1">Ajouter au panier</button> -->
                                                 <button type="button" class="btn btn-sm btn-primary" id="livre_1" onclick="ajouter(<?php echo $livre['livre_id']; ?>,'<?php echo $livre['livre_nom']; ?>',<?php echo $livre['prix']; ?>)">Ajouter au panier</button>
                                             </small>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>

             <footer>
                 <?php include_once("footer.php"); ?>
             </footer>
             <!-- /END THE FEATURETTES -->
             <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
     </body>

     <script src="Front/script/bootstrap.bundle.js"></script>
     <script src="panier.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

     </html>

 <?php
    } else {
        echo '<h2> Votre Recherche n\'est pas Valide Merci de Reassayer ! ';
        header("Location:" . $lienPage . "home.php");
        exit();
    }
    ?>