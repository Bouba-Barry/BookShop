<?php
require 'db_connexion/connect_db.php';
function readAll($table)
{
    try {
        // $connect = new PDO('mysql:host=localhost;dbname=db_ECommerce;charset=utf8', 'root', '');
        $connect = connectez();
        $sqlQuerry = "SELECT * FROM $table";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        // var_dump($resultat);
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function ajouterLivre($data, $ficImg)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "INSERT INTO Livre(livre_nom, livre_description,prix,livre_img, quantite, id_categorie,id_Auteur , date_Ajout, etat)
        VALUES (:nom, :descript, :prix , :img, :quantite, :cate, :aut, :date_ajout, :etat)";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'nom' => strtoupper($data['nomLivre']),
            'descript' => $data['livre_desc'],
            'prix' => $data['prix'],
            'img' => $ficImg,
            'quantite' => $data['quantite'],
            'cate' => $data['categorie'],
            'aut' => $data['auteur'],
            'date_ajout' => date('Y-m-d'),
            'etat' => true
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function ajouterCategorie($categorie)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "INSERT INTO Categorie(categorie_nom) Values('$categorie')";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function ajouterAuteur($auteur)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "INSERT INTO Auteur(auteur_nom) Values(:nom)";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'nom' => $auteur,
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function updateLivre($data, $fic, $id)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "UPDATE Livre SET livre_nom = :nom, livre_description = :descript ,prix = :prix, livre_img = :img, quantite = :quantite, id_categorie = :cat,id_Auteur= :aut WHERE livre_id = $id";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'nom' => strtoupper($data['nomLivre']),
            'descript' => $data['livre_desc'],
            'prix' => $data['prix'],
            'img' => $fic,
            'quantite' => $data['quantite'],
            'cat' => $data['categorie'],
            'aut' => $data['auteur'],
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function updateLivreSansImage($data, $id)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "UPDATE Livre SET livre_nom = :nom, livre_description = :descript ,prix = :prix, quantite = :quantite, id_categorie = :cat, id_Auteur= :aut WHERE livre_id = $id";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'nom' => strtoupper($data['nomLivre']),
            'descript' => $data['livre_desc'],
            'prix' => $data['prix'],
            'quantite' => $data['quantite'],
            'cat' => $data['categorie'],
            'aut' => $data['auteur'],
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function IncrementQuantity($id, $quantite)
{
    try {
        $connect = connectez();
        $sql = "UPDATE Livre SET quantite = $quantite WHERE livre_id = $id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function deleteLivre($id)
{
    $connect = connectez();
    $sqlQuerry = "DELETE FROM Livre WHERE livre_id = $id ";
    $stmt = $connect->prepare($sqlQuerry);
    $stmt->execute();
}
function deleteCategorie($id)
{
    try {
        $connect = connectez();
        $sqlQuerry = "DELETE FROM Categorie WHERE categorie_id = $id ";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function deleteAuteur($id)
{
    try {
        $connect = connectez();
        $sqlQuerry = "DELETE FROM Auteur WHERE auteur_id = $id ";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function selectById($id)
{
    try {
        // $connect = new PDO('mysql:host=localhost;dbname=db_ECommerce;charset=utf8', 'root', '');

        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Livre WHERE livre_id=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();
        // var_dump($resultat);
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function selectCatById($id)
{
    try {
        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Categorie WHERE categorie_id=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function selectAutById($id)
{
    try {
        // $connect = new PDO('mysql:host=localhost;dbname=db_ECommerce;charset=utf8', 'root', '');
        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Auteur WHERE auteur_id=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();
        // var_dump($resultat);
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function updateCategorie($id, $nom)
{
    try {
        $connect = connectez();
        $sql = "UPDATE Categorie SET categorie_nom = '$nom' WHERE categorie_id=$id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function updateAuteur($id, $nom)
{
    try {
        $connect = connectez();
        $sql = "UPDATE Auteur SET auteur_nom = '$nom' WHERE auteur_id=$id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function SelectUserById($id)
{
    try {

        $connect = connectez();
        $sqlQuerry = "SELECT * FROM User WHERE user_id=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();

        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function SelectAdminById($id)
{

    try {

        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Admin WHERE admin_id=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function SelectNew()
{

    try {
        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Livre WHERE (DAYOFYEAR(CURDATE())-DAYOFYEAR(date_Ajout)) BETWEEN 0 and 7 ";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function EltPage($offset, $perPage)
{
    try {
        $connect = connectez();
        $sql = "SELECT * FROM Livre LIMIT $perPage OFFSET $offset ";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function nbreLivre()
{
    try {

        $connect = connectez();


        $sqlNbreArti = "SELECT COUNT(livre_id) as 'nbrArti' FROM Livre";
        $res = $connect->prepare($sqlNbreArti);
        $res->execute();
        $req = $res->fetch();
        $nbrArt = $req['nbrArti'];
        return $nbrArt;
    } catch (Exception $e) {
        $e->getMessage();
    }
}


function EditUserProfile($data, $id)
{

    try {
        $connect = connectez();
        $sqlQueryInsert = "UPDATE User SET user_nom = :nom, user_login = :Ulogin , user_tel = :tel, user_adresse = :adresse WHERE user_id = $id";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'nom' => $data['name'],
            'Ulogin' => $data['login'],
            'tel' => $data['tel'],
            'adresse' => $data['adresse']
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function SelectLivreByIdCat($idCat)
{

    try {
        $connect = connectez();
        $sqlQuerry = "SELECT * FROM Livre WHERE id_categorie=$idCat";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function findCatByNom($id): String
{

    try {
        $connect = connectez();
        $sqlQuerry = "SELECT categorie_nom FROM Categorie WHERE id_categorie=$id";
        $stmt = $connect->prepare($sqlQuerry);
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}
function findLivreByCatName($nom)
{
    try {
        $connect = connectez();
        $sql = "SELECT L.* FROM Livre L, Categorie C WHERE L.id_categorie = C.categorie_id and lower(categorie_nom) like lower('$nom')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function ajouterPayment($data)
{
    try {
        $connect = connectez();
        $sqlQueryInsert = "INSERT INTO Paiements(payment_id, payment_status, payment_amount, payment_currency, payment_date, payer_email, payer_nom) 
        VALUES(:pay_id, :pay_stat, :pay_mont, :pay_cur, :pay_date, :payer_email, :payer_nom)";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute([
            'pay_id' => $data['payer_id'],
            'pay_stat' => $data['status'],
            'pay_mont' => $data['montant'],
            'pay_cur' => $data['devise'],
            'pay_date' => $data['date_pay'],
            'payer_email' => $data['email'],
            'payer_nom' => $data['nomPayer']
        ]);
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function updateArticle($id, $quantite)
{

    try {
        $connect = connectez();
        $sqlQueryInsert = "UPDATE Livre SET quantite = quantite - $quantite Where livre_id =$id";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function insertUser($nom, $email, $pass)
{

    try {
        $connect = connectez();
        $sqlQueryInsert = "INSERT INTO User (user_nom, user_login, user_password) Values('$nom', '$email', '$pass')";
        $stmt = $connect->prepare($sqlQueryInsert);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
