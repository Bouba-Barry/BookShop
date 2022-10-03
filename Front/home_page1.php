<?php require 'Models.php'; ?>
<?php
// $livres = readAll("Livre");

$perPage = 6;
$nbreLivre = nbreLivre();
$nbrePages = ceil($nbreLivre / $perPage);
global $currentPage;
if (isset($_GET['p']) && $_GET['p'] >= 1 && $_GET['p'] <= $nbrePages) {
  $currentPage = $_GET['p'];
} else {
  $currentPage = 1;
}
$offset = $perPage * ($currentPage - 1);
$livres = EltPage($offset, $perPage);

global $lienPage;
$lienPage = "http://localhost/FormationIRISI/Projet-eCommerce/";
?>

<head>
  <style>
    .card-text {
      display: none;
    }

    .card-text:hover {
      display: inline-block;
    }

    .album {
      background-color: #e4f0ed;
    }

    .page-item,
    .page-link {
      color: blueviolet;
    }
  </style>
</head>

<body>
  <main>
    <div class="album py-5">
      <div class="container">

        <div class="d-flex justify-content-center mb-3 mt-2">
          <h4 class="text-center">Decouvrez Nos Articles</h4>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php foreach ($livres as $livre) : ?>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg10 role=" 10mg" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="100%" y="100%" fill="#eceeef" dy=".3em"><img src="Images/<?php echo $livre['livre_img']; ?>" alt="image de livre" class="img_flottant"></text>
                </svg>
                <!-- substr($livre['livre_description'], 0, 100); -->
                <div class="card-body">
                  <h7><?php echo $livre['livre_nom']; ?></h7>
                  <!-- <p class="card-text" style="font-size:0.8rem;">?php echo $livre['livre_nom']; ?></p> -->
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-warning text-muted"><?php echo number_format($livre['prix'], 2, ',', ' '); ?> $</button>

                    </div>
                    <small class="text-muted">
                      <button type="button" class="btn btn-sm btn-primary" id="livre_1" onclick="ajouter(<?php echo $livre['livre_id']; ?>,'<?php echo $livre['livre_nom']; ?>',<?php echo $livre['prix']; ?>)">Ajouter au panier</button>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <footer>
      <div aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <?php if ($currentPage > 1) { ?>
              <a class="page-link" href="<?php echo $lienPage ?>home.php?p=<?php echo $currentPage - 1; ?>">Precedent</a>
            <?php } ?>
          </li>
          <?php for ($i = 1; $i <= $nbrePages; $i++) :  ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo $lienPage ?>home.php?p=<?php echo $i; ?>"><?php echo $i; ?> </a>
            </li>
          <?php endfor; ?>
          <li class="page-item">
            <?php if ($currentPage < $nbrePages) { ?>
              <a class="page-link" href="<?php echo $lienPage ?>home.php?p=<?php echo $currentPage + 1; ?>">Suivant</a>
            <?php } ?>
          </li>
        </ul>
      </div>
      <div class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2022 réalisé par : Boubacar Barry & Issiaka Traoré <br>
          &middot; Pour toute information contactez nous : <a href="#">issiakatraore600@gmail.com</a> &middot; <a href="#">Terms</a></a> &middot; <a href="http://localhost/ecommerce/examples_assembles/page_verif.php">page_verif.php</a></p>
      </div>
    </footer>

    <script src="<?= $lienPage; ?>Front/panier.js"></script>
    <!-- /END THE FEATURETTES -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>