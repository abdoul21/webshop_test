<?php
include("bdd.php");
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bonne affaire</title>
    <?php include("icon_ongle.php"); ?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 30%;
        height: 20%;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav.php" ;?>
                <section class="article-list">

                    <div class="container">

                            <div class="col-md-12">
                                <h2>Promotion</h2>
                            </div>

                        <div class="row">
                            <?php

            // requête SQL pour sélectionner tous les produits de la table "produits" en promo
            $sql = "SELECT * FROM produit INNER JOIN bonne_affaire ON produit.id_promos = bonne_affaire.id_bonne_affaire";
            $result = mysqli_query($bdd,$sql);

            // vérifier si la requête a renvoyé des résultats
            if (mysqli_num_rows($result) > 0) {
                // parcourir chaque ligne de résultat
                while($row = mysqli_fetch_array($result)) {
                    // afficher les données du produit
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<img src='image_webshop/" . $row["image"] . "' class='card-img-top' alt='" . $row["produit"] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row["produit"] . "</h5>";
                    echo "<h5 class='card-title'><strike>".$row["prix"]."€</strike> <mark>-".$row["pourcentage_promos"]."%</mark></h5>";
                    echo "<h5 class='card-title'>".$row["prix"]*((100-$row["pourcentage_promos"])/100)."€</h5>";
                    echo "<a href='conf_reservation.php?id=".$row["idproduit"]."&prix=".$row["prix"]*((100-$row["pourcentage_promos"])/100)."' class='btn btn-primary'>Réserver</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Aucun produit trouvé.";
            }

            // fermer la connexion MySQLi
            mysqli_close($bdd);
            ?>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php include('footer.php');?>
</body>

</html>