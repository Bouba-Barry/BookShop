<?php
session_start();
require 'fonctions_panier_final.php';
if (isset($_GET['id'])) {

    supprimerArticle($_GET['id']);
    $_SESSION['panier']['imp']--;
    header('Location: panier.php');
}
