<?php session_start(); ?>
<?php
if (array_key_exists('username', $_SESSION)) {
    if ($_SESSION['username'] === 'Adminlogged') {
        header("Location:../Admin/index.php");
        exit();
    } else {
        header("Location:User.php");
        exit();
    }
} else {
    // session_unset();
    // session_destroy();
?>
    <?php
    $lien = "http://localhost/FormationIRISI/Projet-eCommerce/";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="style/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>

    <body>
        <section class="vh-110" style="background-color: #7a5059;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="../Front/images/login.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="TraiterLogin.php" method="POST">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <!-- <span class="h1 fw-bold mb-0">Login</span> -->
                                                <a class="btn btn-primary btn-sm btn-block ml-4" href="<?php echo $lien ?>home.php">Back Home</a>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Acceder à votre Compte</h5>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="form2Example17" value="<?php if (isset($_SESSION['login'])) echo $_SESSION['login']; ?>" required name="login" class="form-control form-control-lg" />
                                                <label class="form-label" for="form2Example17">Email address</label>
                                            </div>
                                            <div class="form-outline mb-2">
                                                <input type="password" id="password" required name="password" class="form-control form-control-lg" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <?php if (isset($_GET['msgError']) && !empty($_GET['msgError'])) : ?>
                                                <p class="bg-light text-danger text-center mt-0 fs-5 p-1"><?php echo $_GET["msgError"]; ?></p>
                                            <?php endif; ?>

                                            <div class=" mb-2">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit">Se Connectez</button>
                                            </div>

                                            <!-- <a class="small text-muted" href="#!">Mot de passe oublié?</a> -->
                                            <p class="mt-3 pb-lg-2" style="color: #393f81;">Pas de Compte ? <a href="<?= $lien ?>App/formInscription.php" class="btn btn-info" style="color: #393f81;">S'inscrire Ici</a></p>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>

    </html>