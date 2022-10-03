<?php

// session_start();

// if ($_SESSION['username'] != 'Userlogged') {
//     header('Location: App/login.php?msg=Connectez-Vous Avant Tout payment');
//     exit();
// } else {

//     $idUser =  $_SESSION['idUser'];

if (isset($_GET['Total']) && !empty($_GET['Total']) && is_numeric($_GET['Total'])) {
    $total = $_GET['Total'];

    if ($total <= 0) {
        echo "<h2>Vérifiez le Total de Votre Panier</h2>";
        header("Location: ../Front/panier.php");
        exit();
    } else {
        $clientiD = "AUZwnVqll5m5WEyzIZ8VVpBsZ8HLw7q__OIuuS9hl0AcWg9Xy0ddlrypR-f79FI0ELqwzUgFG3wOIVIb";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
body {
    text-align: center;
    margin: auto;
}
</style>

<body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $clientiD; ?>&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div>
        <h3>Procedez Au Payment de Vos Produits</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque hic itaque optio repellendus ex qui saepe
            exercitationem. Odio perferendis ratione cum fuga repellat hic explicabo aut cupiditate iste est?
            Voluptatum.</p>

    </div>
    <div id="paypal-button-container"></div>
    <script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $total; ?> // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                console.log(orderData);
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
                // console.log("Affichage de la devise");
                // console.log(orderData.purchase_units[0]['amount'].currency_code);



                let devise = orderData.purchase_units[0]['amount'].currency_code;
                let montant = orderData.purchase_units[0]['amount'].value;
                let nom = orderData.payer.name.given_name + ' ' + orderData.payer.name.surname;
                let email = orderData.payer.email_address;
                let adresse = orderData.payer.address;
                let payer_id = orderData.payer.payer_id;
                let status = orderData.status;
                let date_p = orderData.update_time;

                let date_pay = date_p.substring(0, 10);


                createCookie("nomPayer", nom);
                createCookie("montant", montant);
                createCookie("devise", devise);
                createCookie("email", email);
                createCookie("payer_id", payer_id);
                createCookie("status", status);
                createCookie("date_pay", date_pay);


                // console.log("nom=  " + nom);
                // console.log("email = " + email);
                // console.log("payer id = " + payer_id);
                // console.log(" montant " + montant);
                // console.log("status = " + status);
                // console.log("date = " + date_pay);
                // console.log("adresse = " + adresse);

                // function setCookie(nom){

                // }

                // let vJson = {
                //     "nom": nom,
                //     "email": email,
                //     "payer_id": payer_id,
                //     "montant": montant,
                //     "status": status,
                //     "date_pay": date_pay
                // }

                // let str_json = JSON.stringify(vJson);

                // let url = "http://localhost/FormationIRISI/Projet-eCommerce/App/payement.php";

                // request = new XMLHttpRequest()
                // request.open("POST", url, true)
                // request.setRequestHeader("Content-type", "application/json")
                // request.send(str_json)

                function createCookie(name, value) {
                    let date = new Date(Date.now() + 900000); // 15 minutes de durée
                    // date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    let expires = "; expires=" + date.toUTCString();

                    document.cookie = name + "=" + value + expires + "; path=/";
                }


                createCookie("nomPayer", nom);
                createCookie("montant", montant);
                createCookie("devise", devise);
                createCookie("email", email);
                createCookie("payer_id", payer_id);
                createCookie("status", status);
                createCookie("date_pay", date_pay);

                window.location.href =
                    "http://localhost/FormationIRISI/Projet-eCommerce/App/payement.php";

            });
        }
    }).render('#paypal-button-container');
    </script>



    <!-- <form action="payment.php" method="Post" style="display:none ;">
        < </form> -->

</body>

</html>
<?php
    }
}
// }
?>