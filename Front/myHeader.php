<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php $lienPage = "http://localhost/FormationIRISI/Projet-eCommerce/"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Favicon -->
    <link href="<?= $lienPage ?>Front/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= $lienPage ?>Front/lib/animate/animate.min.css" rel="stylesheet">
    <!-- <link href="?= $lienPage ?>Front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= $lienPage ?>Front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= $lienPage ?>Front/css/style.css" rel="stylesheet">
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
            border-right: none;
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
            <form class="search-box" action="<?= $lienPage ?>Front/searchPage.php" method="GET">
                <input type="search" name="q" placeholder="Livre">
                <button type="submit" class="fa fa-search"></button>
            </form>
            <!-- </div> -->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-2 p-lg-0">
                    <a href="<?= $lienPage ?>home.php" class="nav-item nav-link active">Home</a>
                    <a href="<?= $lienPage ?>App/NouveauProduit.php" class="nav-item nav-link">Nouveaute</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categorie Livre</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="<?= $lienPage ?>App/Roman.php" class="dropdown-item">Roman</a>
                            <a href="<?= $lienPage ?>App/Manga.php" class="dropdown-item">Manga</a>
                            <a href="<?= $lienPage ?>App/Litterature.php" class="dropdown-item">Litterature</a>
                            <!-- <a href="" class="dropdown-item">Spirituel</a> -->
                        </div>
                    </div>
                    <a href="<?= $lienPage ?>App/login.php" class=" nav-item nav-link">ACCOUNT</i></a>
                </div>
                <a href="<?= $lienPage ?>Front/panier.php" class="mr-5"><img src="<?= $lienPage ?>Front/images/d-4.png" style="width:25px;" alt="panier"><?= $_SESSION['panier']['imp']; ?></a>
            </div>
        </nav>
    </header>

    <script src="<?= $lienPage ?>Front/lib/wow/wow.min.js"></script>
    <script src="<?= $lienPage ?>Front/lib/easing/easing.min.js"></script>
    <script src="<?= $lienPage ?>Front/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= $lienPage ?>Front/script/Bootstrap.bundle.js"></script>
    <script src="script/bootstrap.bundle.js"></script>


</body>

</html>