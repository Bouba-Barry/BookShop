<?php session_start(); ?>
<?php require_once '../Models.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Formulaire</title>
  <style>
    body {
      width: 900px;
      margin: auto;
      background-color: bisque;
    }

    /* h1{
    text-align: center;
} */
    fieldset {
      width: 700px;
      height: auto;
      border-color: red;
      border-radius: 25px;
      padding: 15px 15px 15px 15px;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
    }

    legend {
      font-weight: bold;
      color: red;
    }

    div {
      margin-top: 15px;
      margin-right: 250px;
    }

    div label {
      margin-right: 10px;
    }

    div input[type=radio] {
      margin-right: 15px;
      margin-left: 30px;
    }

    button[type=submit] {
      width: 112px;
      height: 25px;
      background-color: #4CAF50;
      color: white;
      padding: 5px 5px;
      margin: 8px 0;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type=reset] {
      width: 112px;
      height: 25px;
      background-color: #4CAF50;
      color: white;
      padding: 5px 5px;
      margin: 8px 0;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type=reset]:hover {
      background-color: #e71818;
    }

    div input {
      background-color: beige;
      padding: 5px 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
  </style>
</head>

<body>

  <h1>formulaire d'inscription</h1>

  <form action="#" method="POST">
    <fieldset>
      <legend>Vos données personnelles</legend>

      <div>
        <label for="nom">Nom*</label>
        <input type="text" name="nom" id="nom" value="<?php if (isset($_SESSION['nom'])) echo $_SESSION['nom']; ?>" placeholder="Votre nom" required size="25">
      </div>
      <div id="errorName"></div>

      <div>
        <label for="email">Adresse Email*</label>
        <input type="mail" name="email" id="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" placeholder="user@exemple.com" required size="25">
      </div>
      <div id="errorMail"></div>

      <div>
        <label for="password">Mot de passe*</label>
        <input type="password" name="password" id="password" required placeholder="Votre mot de passe" size="25">
      </div>
      <div id="errorPassword"></div>

      <div>
        <label for="passwordConf">Mot de passe*</label>
        <input type="password" id="passwordConf" name="passwordConf" required placeholder="Confirmer votre mot de passe" size="25">
      </div>
      <div id="errorConfirm"></div>

      <div>
        <button type="submit" name="btn1">M'inscrire</button>
        <button type="reset">Reset</button>
      </div>

    </fieldset>
  </form>
  <script>
    /** Traitement pour le nom */
    let nom = document.getElementById("nom");
    nom.addEventListener("blur", function() {
      let nom = document.getElementById("nom");
      let contenu = nom.value;
      if (contenu.length < 2) {
        let erreur = document.getElementById("errorName");
        erreur.textContent = "Incorrect: au moins 2 caractères";
        nom.style.borderColor = "red";
        erreur.style.color = "red";
      } else {
        nom.style.background = "rgba(0, 200, 255,0.3)";
        nom.style.borderColor = "rgb(0, 255, 85)";
        let erreur = document.getElementById("errorName");
        erreur.textContent = "";
      }
    });

    let email = document.getElementById("email");
    email.addEventListener("blur", function() {
      let input = document.getElementById("email");
      let email = input.value;

      if (email.endsWith("@gmail.com")) {
        input.style.background = "rgba(0, 200, 255,0.3)";
        input.style.borderColor = "rgb(0, 255, 85)";
        document.getElementById("errorMail").innerHTML = "";
      } else {
        input.style.borderColor = "red";
        let follow_div = document.getElementById("errorMail");
        follow_div.style.color = "red";
        follow_div.innerHTML = "Ceci n'est pas un compte gmail !";
      }
    });

    let password = document.getElementById("password");
    password.addEventListener("blur", function() {
      let password = document.getElementById("password");
      let contenu = password.value;
      if (contenu.length < 8) {
        let erreur = document.getElementById("errorPassword");
        password.style.borderColor = "red";
        erreur.textContent = "Incorrect: au moins 8 caractères";
        erreur.style.color = "red";
      } else {
        password.style.background = "rgba(0, 200, 255,0.3)";
        password.style.borderColor = "rgb(0, 255, 85)";
        document.getElementById("errorPassword").textContent = "";
      }
    });

    let passwordConfirm = document.getElementById("passwordConf");
    passwordConfirm.addEventListener("blur", function() {
      let passwordConf = document.getElementById("passwordConf");
      let contenu = passwordConf.value;

      let password = document.getElementById("password");
      let valPred = password.value;

      if (contenu === valPred) {
        passwordConf.style.background = "rgba(0, 200, 255,0.3)";
        passwordConf.style.borderColor = "rgb(0, 255, 85)";
        document.getElementById("errorConfirm").textContent = "";
      } else {
        let erreur = document.getElementById("errorConfirm");
        erreur.textContent = "les passwords sont différents !";
        erreur.style.color = "red";
        passwordConf.style.borderColor = "red";
      }
    });
  </script>
</body>

</html>

<?php

if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConf'])) {

  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];

  $_SESSION['nom'] = $nom;
  $_SESSION['email'] = $email;

  $test = false;

  if ($password === $passwordConf) {
    $_SESSION['password'] = '';
    $test = true;
  } else {
    $_SESSION['password'] = 'Mot de pass different';
    $test = false;
  }

  if ($test === true) {
    insertUser($nom, $email, $password);
    unset($_SESSION['nom']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    // header("Location:../home.php");
    // exit();
  } else {
    header("Location: formInscription.php");
    exit();
  }
}
?>