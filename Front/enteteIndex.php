<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['panier']['imp'])) {
    $_SESSION['panier']['imp'] = 0;
} ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- Favicon -->
    <link href="Front/img/favicon.ico" rel="icon">
    <?php $lien = "http://localhost/FormationIRISI/Projet-eCommerce/"; ?>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Front/css/style.css" rel="stylesheet">
    <style>
        nav .search-box {
            display: flex;
            margin: auto 0;
            height: 35px;
            line-height: 35px;
            margin-right: 15px;
        }

        nav .search-box input {
            border: 1px solid saddlebrown;
            outline: none;
            background: #fff;
            height: 100%;
            padding: 0 10px;
            font-size: 0 10px;
            font-size: 15px;
            width: 350px;

        }

        nav .search-box button {
            color: #3621af;
            font-size: 20px;
            background: #fff;
            border: none;
            height: 100%;
            padding: 5px;
            position: relative;
            cursor: pointer;
            z-index: 1;
        }

        @media screen and (max-width: 992px) {
            nav .search-box {
                width: 25%;
                display: inline-flex;
                justify-content: center;
                margin-bottom: 5px;
            }
        }

        @media screen and (max-width: 576px) {
            nav .search-box {
                display: none;
            }

        }

        nav .search-box button:hover {
            color: #fff;
        }

        nav .search-box button::after {
            height: 100%;
            width: 0%;
            content: '';
            background: #ff003c;
            position: absolute;
            top: 0;
            right: 0;
            z-index: -1;
            transition: 0.5s;
        }

        nav .search-box button:hover::after {
            width: 100%;

        }

        /** end de l'input */
    </style>
</head>

<body>

    <header id="maNav">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-black sticky-top p-0">
            <a href="" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
                <h2 class="m-0"></i>BOOKSHOP</h2>
            </a>
            <form class="search-box" action="Front/searchPage.php" method="GET">
                <input type="search" name="q" placeholder="Livre">
                <button type="submit" class="fa fa-search"></button>
            </form>
            <!-- </div> -->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-2 p-lg-0">
                    <a href="<?= $lien ?>home.php" class="nav-item nav-link active">Home</a>
                    <a href="<?= $lien ?>App/NouveauProduit.php" class="nav-item nav-link">Nouveaute</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categorie Livre</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="<?= $lien ?>App/Roman.php" class="dropdown-item">Roman</a>
                            <a href="<?= $lien ?>App/Manga.php" class="dropdown-item">Manga</a>
                            <a href="<?= $lien ?>App/Litterature.php" class="dropdown-item">Litterature</a>
                            <!-- <a href="" class="dropdown-item">Spirituel</a> -->
                        </div>
                    </div>
                    <a href="<?php echo $lien ?>App/login.php" class=" nav-item nav-link">ACCOUNT</i></a>
                </div>
                <a href="<?= $lien ?>Front/panier.php" class="mr-5"><img src=" Front/images/d-4.png" style="width:25px;" alt="panier"><?= $_SESSION['panier']['imp']; ?></a>
            </div>
        </nav>
    </header>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height:500px ;">
                <div class="carousel-item active">
                    <img class="w-100 h-100" src="Front/images/Roman.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h5><a href="<?= $lien ?>App/Roman.php" class="btn btn-info">DECOUVRIR</a></h5>
                                    <p>Cette Collection Regroupe un ensemble de Livre, soit déjà adapté au Cinema, soit Très connus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="Front/images/mangas.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h5><a href="<?= $lien ?>App/Manga.php" class="btn btn-info">DECOUVRIR</a></h5>
                                    <p>Vous Decouvrirai le monde des BD Comme on aime souvant l' appelé, des mangas populaires, des oeuvres extraordinaires</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="w-100" src="Front/images/DEVPerso.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h5><a href="<?php echo $lien ?>App/Litterature.php" class="btn btn-info">DECOUVRIR</a></h5>
                                    <p>Cette Collection Regroupe les livres Vous permetant d' Améliorer Votre personnalitée !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon precedent" aria-hidden="true"></span>
                <span class="visually-hidden">Precedent</span>
            </button>
            <button class="carousel-control-next suivant" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <script>
        /*********************                       */
        let img_slider = document.querySelectorAll(".carousel-item");

        // etape pour savoir quel image afficher
        let etape = 0;
        // le nbre d'images
        let nbre_img = img_slider.length;

        let precedent = document.querySelector(".precedent");
        let suivant = document.querySelector(".suivant");
        // une classe active pr savoir le deplacement

        function removeActiveImg() {
            for (let i = 0; i < nbre_img; i++) {
                img_slider[i].classList.remove("active");
            }
        }

        // qd on clique sur next la classe active est enlever => elle se deplace
        suivant.addEventListener("click", function() {
            etape++;
            if (etape >= nbre_img) {
                etape = 0;
            }
            removeActiveImg();
            img_slider[etape].classList.add("active");
        });
        precedent.addEventListener("click", function() {
            etape--;
            if (etape < 0) {
                etape = nbre_img - 1;
            }
            removeActiveImg();
            img_slider[etape].classList.add("active");
        });

        const Myintervale = setInterval(() => {
            etape++;
            if (etape >= nbre_img) {
                etape = 0;
            }
            removeActiveImg();
            img_slider[etape].classList.add("active");
        }, 3000);
    </Script>
    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="Front/lib/wow/wow.min.js"></script>
    <script src="Front/lib/easing/easing.min.js"></script>
    <script src="Front/lib/waypoints/waypoints.min.js"></script>
    <script src="Front/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Front/script/Bootstrap.bundle.js"></script>



</body>

</html>