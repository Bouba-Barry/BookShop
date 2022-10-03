<?php require '../Models.php'; ?>
<?php
if (isset($_GET['id'])) {

    deleteLivre($_GET['id']);

    header('Location: produit.php?msgDelete=Livre avec id' . $_GET['id'] . ' supprimer avec succes');
    exit();

?>
<?php } ?>