<?php
// session_start();

function supprimerArticle($livre_id)
{
   $test_id = htmlspecialchars($livre_id);
   $test_id = intval($test_id);
   $livre_id = $test_id;
   //Si le panier existe
   if (isset($_GET['id']) && !empty($_GET['id'])) {

      //Nous allons passer par un panier temporaire
      $tmp = array();
      $tmp['livre_id'] = array();
      $tmp['livre_nom'] = array();
      $tmp['quantite'] = array();
      $tmp['prix'] = array();

      foreach ($_SESSION['panier']['livre_id'] as $key => $value) {

         if ($_SESSION['panier']['livre_id'][$key] !== $livre_id) {

            array_push($tmp['livre_id'], $_SESSION['panier']['livre_id'][$key]);
            array_push($tmp['livre_nom'], $_SESSION['panier']['livre_nom'][$key]);
            array_push($tmp['quantite'], $_SESSION['panier']['quantite'][$key]);
            array_push($tmp['prix'], $_SESSION['panier']['prix'][$key]);
         }
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   } else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal()
{
   $total = 0;
   // for ($i = 0; $i < count($_SESSION['panier']['livre_id']); $i++) {
   //    $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
   // }
   foreach ($_SESSION['panier']['livre_id'] as $key => $value) {
      $total += $_SESSION['panier']['quantite'][$key] * $_SESSION['panier']['prix'][$key];
   }
   return $total;
}
/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier()
{
   unset($_SESSION['panier']);
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
      return count($_SESSION['panier']['livre_id']);
   else
      return 0;
}
/**
 * Compte le nombre de l'article sélectionné 
 * @return int
 */
function compterParArcticle($livre_id)
{
   if (isset($_SESSION['panier'])) {

      $positionLivre = array_search($livre_id,  $_SESSION['panier']['livre_id']);
      if ($positionLivre !== false) {
         return  $_SESSION['panier']['quantite'][$positionLivre] * $_SESSION['panier']['prix'][$positionLivre];
      } else {
         return 0;
      }
   }
}
