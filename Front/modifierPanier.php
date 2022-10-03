<?php
session_start();

 if (isset($_POST)) 
 {
     if (isset($_POST['id']) && isset($_POST['quantite']) && !empty($_POST['id']) && !empty($_POST['quantite'])) 
     {
         $quantite =  intval(htmlspecialchars($_POST['quantite'])) ;
         $id =  intval(htmlspecialchars($_POST['id']));
       #On vérifie si le livre existe ou non
         $positionLivre = array_search($id,$_SESSION['panier']['livre_id']);
         if ($positionLivre != false) {
             
             $_SESSION['panier']['quantite'][$positionLivre] = $quantite;
             
         }
     }
     
     header('Location: panier.php');
     exit();
 }



 /**
 * Modifie la quantitÃ© d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
// function modifierQTeArticle($livre_id,$quantite)
// {
//     //Si le panier existe 
//     if (isset($_SESSION['panier']) && isset($_SESSION['panier']['livre_id']) && isset($_SESSION['panier']['livre_nom']) && isset($_SESSION['panier']['quantite']) && isset($_SESSION['panier']['prix']) &&
//         !empty($_SESSION['panier']) && !empty($_SESSION['panier']['livre_id']) && !empty($_SESSION['panier']['livre_nom']) && !empty($_SESSION['panier']['quantite']) && !empty($_SESSION['panier']['prix'])  )
//     {
//        //Si la quantitÃ© est positive on modifie sinon on supprime l'article
//         $quantite = intval(htmlspecialchars($quantite));
//         $livre_id = intval(htmlspecialchars($livre_id));
//        if ($quantite > 0)
//        {
//           //Recharche du produit dans le panier
//           $positionLivre = array_search($livre_id,  $_SESSION['panier']['livre_id']);
 
//           if ($positionLivre !== false)
//           {
//              $_SESSION['panier']['quantite'][$positionLivre] = $quantite ;
//           }
//        }
      
//     }
//     else
//     echo "Un problÃ¨me est survenu veuillez contacter l'administrateur du site.";
//  }
