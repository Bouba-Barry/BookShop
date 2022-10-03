<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            align-items: baseline;
            padding-top: 30px;
            min-height: 12vh;
            /* background-color: rgb(150, 101, 126); */
            background-color: #2d114a;
        }

        .logo {
            color: #e1d4ee;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 15px;
            top: 0;
            left: 0;
            /* z-index: -1; */
        }

        .nav-links img {
            width: 20px;

        }

        .nav-links {
            display: flex;
            justify-content: space-around;
            width: 35%;
            height: 5vh;
        }

        .nav-links li {
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
        }

        .nav-links a {
            color: whitesmoke;
            text-decoration: none;
            letter-spacing: 3px;
            font-weight: bold;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #cfac3a;

        }

        /** la boite de recherche* */
        /* nav .search-box {
            display: flex;
            margin: auto 0;
            height: 35px;
            line-height: 35px;
        } */

        /* nav .search-box input {
            border: none;
            outline: none;
            background: #fff;
            height: 100%;
            padding: 0 10px;
            font-size: 0 10px;
            font-size: 15px;
            width: 350px;

        } */

        /* nav .search-box button {
            color: #3621af;
            font-size: 20px;
            background: #fff;
            border: none;
            height: 100%;
            padding: 8px;
            position: relative;
            cursor: pointer;
            z-index: 1;
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

        } */

        /** end de l'input */



        .burger div {
            width: 25px;
            height: 3px;
            background-color: rgb(226, 226, 226);
            margin: 5px;
            transition: all 0.3s ease;
        }

        .burger {
            display: none;
            cursor: pointer;
        }

        form {
            display: none;
        }

        .fa-solid:hover {
            color: #cfac3a;

        }

        @media screen and(max-width:1024px) {
            .nav-links {
                width: 60%;
            }
        }

        @media screen and (max-width: 992px) {
            body {
                overflow-x: hidden;
            }

            /* nav{
        display: block;
        padding: 0;
    } */
            /* nav .search-box {
                width: 25%;
                display: inline-flex;
                justify-content: center;
                margin-bottom: 5px;
            } */

            .nav-links {
                position: absolute;
                right: 0px;
                /* height: 90vh; */
                height: 100%;
                top: 12vh;
                width: 100%;
                color: white;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.9);
                display: flex;
                flex-direction: column;
                align-items: center;
                transform: translateX(100%);
                transition: transform 0.5s ease-in;
            }

            .nav-links li {
                opacity: 0;
            }

            .burger {
                display: block;
                margin-top: 5px;
            }

            .nav-active {
                transform: translateX(0%);
            }

            @keyframes navLinkFade {
                from {
                    opacity: 0;
                    transform: translateX(50px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0px);
                }
            }

            .toggle .line1 {
                transform: rotate(-45deg) translate(-5px, 6px);

            }

            .toggle .line2 {
                opacity: 0;

            }

            .toggle .line3 {
                transform: rotate(45deg) translate(-5px, -6px);
            }
        }

        @media screen and (max-width: 576px) {

            /* nav .search-box{
        display: inline-flex;
        justify-content: flex-end;
        margin-bottom: 0px;
    } */
            nav .search-box {
                display: none;
            }

        }
    </style>
</head>

<body>

    <header>

        <nav>
            <div class="logo">
                <h4> BookShop</h4>
            </div>

            <ul class="nav-links">
                <li><a href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/index.php">Accueil</a></li>
                <li><a href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/Categorie.php">Categorie</a></li>
                <li><a href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/produit.php">Produits</a></li>
                <li><a href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/Auteur.php">Auteur</a></li>
                <li><a href="http://localhost/FormationIRISI/Projet-eCommerce/Admin/Account.php"><i class="fa-solid fa-user"></i></a></li>

                <!-- <li><a href="#"><img src="images/d-4.png"></a></li> -->

            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>


    <script>
        const navSlide = () => {
            const burger = document.querySelector(".burger");
            const nav = document.querySelector(".nav-links");
            const navLinks = document.querySelectorAll(".nav-links li");

            burger.addEventListener("click", () => {
                nav.classList.toggle("nav-active");

                navLinks.forEach((link, index) => {
                    if (link.style.animation) {
                        link.style.animation = "";
                    } else {
                        link.style.animation = `navLinkFade 0.5s ease forwards ${
          index / 7 + 1.5
        }s`;
                    }
                });

                // burger animation
                burger.classList.toggle("toggle");
            });
        };
        navSlide();
    </script>
</body>

</html>