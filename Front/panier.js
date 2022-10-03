function ajouter(id, nom, prix_unit) {
  url = `http://localhost/FormationIRISI/Projet-eCommerce/Front/ajouterPanierGET.php?id=${id}&nom=${nom}&quantite=1&prix=${prix_unit}`;
  // location.href = url;

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert("Votre Livre a été Ajouté au Panier !");
      console.log(xhr.responseText);
    }
  };
  xhr.open("GET", url, true);
  xhr.send();
}
