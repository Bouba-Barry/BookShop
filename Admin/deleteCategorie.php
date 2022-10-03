<?php require '../Models.php'; ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {


    if (deleteCategorie($_GET['id'])) {
        header('Location: Categorie.php?msgDelete=Categorie avec id' . $_GET['id'] . ' supprimer avec succes');
        exit();
    } else {
        header('Location: Categorie.php?msgDelete=Categorie avec id = ' . $_GET['id'] . ' Ne peut pas être supprimer');
        exit();
    }

?>
<?php } ?>