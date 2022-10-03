<?php
// session_start();
require_once "fonctions_panier_final.php";
require_once '../Models.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.98.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>panier</title>
  <?php $lienPage = "http://localhost/FormationIRISI/Projet-eCommerce/"; ?>

</head>
<header><?php include_once("myHeader.php"); ?></header>
<h2 style="text-align:center; margin-top:50px;color:blue;font-weight:bold;">
  Votre panier
</h2>
<!-- <form method="post" action=""> -->
<table class="table" style="margin-top:70px;">
  <thead>
    <tr>
      <!-- <th scope="col">Images</th> -->
      <th scope="col">Livre</th>
      <th scope="col">Prix unitaire</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead><?php $valTotal = MontantGlobal(); ?>
  <tbody>
    <?php

    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
      // var_dump($_SESSION['panier']);
      $nbArticles = count($_SESSION['panier']['livre_id']);

      if ($nbArticles <= 0)
        echo "<tr><th scope=\"row\" colspan=\"6\" style=\"color:red\">Votre panier est vide </ th></tr>";
      else {
        foreach ($_SESSION['panier']['livre_id'] as $key => $value) {

          $prod = selectById($key);
    ?>
          <form action="modifierPanier.php" method="POST">
            <tr>
              <td><?= $_SESSION['panier']['livre_nom'][$key]; ?></td>
              <td><?= $_SESSION['panier']['prix'][$key] ?></td>
              <td><input type="number" size="4" name="quantite" min=1 max=<?= $prod['quantite']; ?> value="<?= htmlspecialchars($_SESSION['panier']['quantite'][$key])  ?>" />
              </td>
              <td><?= htmlspecialchars(compterParArcticle($_SESSION['panier']['livre_id'][$key])) ?>

              </td>
              <td>
                <button type="submit" class="btn btn-primary">
                  modifier
                </button>

              </td>
              <td>
                <a href="<?= htmlspecialchars("supprimerPanier.php?id=" . rawurlencode($_SESSION['panier']['livre_id'][$key])) ?>" class="btn btn-danger">supprimer</a>
              </td>
            </tr>
          </form>


      <?php
        }
      } ?>

      <tr>
        <th colspan="3" scope="row"> </th>
        <td>
          Total =
        </td>
        <td>
          <?= MontantGlobal() ?>
        </td>
      </tr>
      <tr>
        <th colspan="5" scope="row" style="color:blue;">
          Pour vider panier cliquer ici ====>>>
        </th>
        <td>
        </td>
        <td>
          <a href="<?= $lienPage ?>Front/viderPanier.php" style="color:white;" class="btn btn-danger"> Vider le panier</a>

        </td>
      </tr>
      <h3 style="color:blue;width:300px" style="text-align:center;">
        <a class="btn btn-info" href="<?= $lienPage ?>App/PaypalPayment.php?Total=<?= $valTotal; ?>" style="color:blue;width:300px">
          Passer la commande
        </a>
      </h3>
    <?php
    }

    if ($_SESSION['panier'] === []) {
      echo "<tr><th scope=\"row\" colspan=\"6\" style=\"color:red\">Votre panier est vide. Merci de le ravitailler !</ th></tr>";
    }
    ?>
</table>

<!-- ?php $_SESSION['art'] = $_SESSION['panier']['livre_id'];
  var_dump($_SESSION['art']);
  echo $_SESSION['art']['livre_nom']; ?> -->

<footer style="margin-top:100px">
  <!-- ?php require 'footer.php'; ?> ?php //echo $lienPage; 
                                    ?> -->
</footer>
<script src="panier.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>