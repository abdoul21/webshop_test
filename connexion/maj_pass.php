<?php
include "../bdd.php";
session_start();

$id = $_SESSION['idmembre'];
if (isset($_POST['mja'])) {
    $password = htmlentities($_POST["password"], ENT_QUOTES, "utf-8");
    $verif_pass = htmlentities($_POST["password_repeat"], ENT_QUOTES, "utf-8");

    if ($password != $verif_pass) {
        $message_erro = "les mots de passe ne sont pas identiques";
        echo "<script type='text/javascript'>alert('$message_erro'); document.location.href = 'maj_pass.php'</script>";
    } else {
        $pass_hache = md5($password);

        $maj_pass = "UPDATE utilisateurs SET password='" . $pass_hache . "'WHERE idmembre='" . $id . "' ";
        echo "<script>alert('Votre mot de passe a était modifier');</script>";
        echo "<script>document.location.href = 'login.html';</script>";
        session_destroy();
    }
    mysqli_query($bdd, $maj_pass);

    mysqli_close($bdd);

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mot de passe oublier</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/Webshop.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/untitled-1.css">
    <link rel="stylesheet" href="../assets/css/untitled-2.css">
    <link rel="stylesheet" href="../assets/css/untitled-3.css">
    <link rel="stylesheet" href="../assets/css/untitled-4.css">
    <link rel="stylesheet" href="../assets/css/untitled-5.css">
    <link rel="stylesheet" href="../assets/css/untitled-6.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image"
                                 style="background-image: url(&quot;../assets/img/Webshop.png&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <p class="text-dark mb-4">Changer votre mot de passe</p>
                                </div>
                                <form class="user" method="post">
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="password"
                                               aria-describedby="emailHelp" placeholder="Mot de passe" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="password"
                                               id="exampleInputPassword" placeholder="confirmer votre mot de passe"
                                               name="password_repeat"></div>
                                    <div class="mb-3">

                                    </div>
                                    <button class="btn  d-block btn-user w-100 btn-secondary" type="submit" name="mja"
                                            style="">Valider
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="../ajout_menbre/register.html">Créer un
                                        compte!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

</html>