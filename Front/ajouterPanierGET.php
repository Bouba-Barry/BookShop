<?php
    session_start();
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
        $_SESSION['panier']['livre_id']=[];
        $_SESSION['panier']['livre_nom']=[];
        $_SESSION['panier']['quantite']=[];
        $_SESSION['panier']['prix']=[];

  
        
    }
    
    // var_dump($_GET);
    if (isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prix'])
        && !empty($_GET['id']) && !empty($_GET['nom']) && !empty($_GET['prix']) ) 
    {
        $id = htmlspecialchars($_GET['id']);
        $id = intval($id);
        $nom = htmlspecialchars($_GET['nom']);
        // echo $nom;
        $quantite = 1;
       
        $prix = htmlspecialchars($_GET['prix']);
        $prix = floatval($prix);

        #On teste si les inputs sont les valeurs attendues
        if (is_int($id) && is_float($prix)) {
            // echo "$id";
            $_SESSION['panier']['livre_id'][$id] = $id;
            $_SESSION['panier']['livre_nom'][$id] = $nom;
            $_SESSION['panier']['quantite'][$id] = $quantite;
            $_SESSION['panier']['prix'][$id] = $prix;
            // http://loc header('Locaction:alhost/ecommerce/projet/home.php');
            // header('Location: test.php');
            // echo "yes";

            $_SESSION['panier']['imp']++;
        }
        else {
            die("Valeurs d'entrée incorrectes !!");
         }
    }
