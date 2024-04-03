<?php include("bdd.php");
session_start();
if ($_SESSION["id_role"] == 2) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Profile</title>
        <?php include("icon_ongle.php") ?>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Article-List.css">
        <link rel="stylesheet" href="assets/css/untitled-1.css">
        <link rel="stylesheet" href="assets/css/untitled-2.css">
        <link rel="stylesheet" href="assets/css/untitled-3.css">
        <link rel="stylesheet" href="assets/css/untitled-4.css">
        <link rel="stylesheet" href="assets/css/untitled-5.css">
        <link rel="stylesheet" href="assets/css/untitled-6.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
    </head>

    <body id="page-top">
    <div id="wrapper">
        <?php include "navmembre.php"; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav.php";
                $idmembres = $_SESSION['idmembre'];
                $nom_uti = $_SESSION['prenom'];
                $affiche = "SELECT nom,prenom,sexe,age,adresse,email,telephone FROM  utilisateurs WHERE idmembre = '$idmembres'";
                $resultat = mysqli_query($bdd, $affiche);

                $point = "SELECT point_pour, COUNT(point_pour) as toto FROM point where nom = '$nom_uti'";
                $result = mysqli_query($bdd,$point);
                $resulta_p=mysqli_fetch_array($result);
                $result_point = $resulta_p[0] *$resulta_p["toto"];
                //echo $resultater["toto"];
                //$data_point = mysqli_fetch_assoc($result);
                $bdd ->close();
                //echo $nom_uti;
                while ($donne = mysqli_fetch_array($resultat))

                {
                ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Mon Profile <?php echo $donne['nom']; ?></h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <p class="description">NOM <?php echo $donne['nom']; ?></p>
                                    <p class="description">PRENOM <?php echo $donne['prenom']; ?></p>
                                    <p class="description">SEXE <?php echo $donne['sexe']; ?></p>
                                    <p class="description">AGE <?php echo $donne['age']; ?></p>
                                    <p class="description">ADRESSE <?php echo $donne['adresse']; ?></p>
                                    <p class="description">EMAIL <?php echo $donne['email']; ?></p>
                                    <p class="description">TELEPHONE <?php echo $donne['telephone']; ?></p>

                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-8">
                            <h4>Point </h4>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $result_point;?>%" aria-valuenow="<?php echo $result_point;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $result_point;?> point</div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    </body>

    </html>
<?php } else {
    echo "<script > document.location.href = '403.html'</script>";
}
?>