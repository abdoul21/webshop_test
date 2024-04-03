<?php  include("bdd.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Produit</title>
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

            <?php include "nav.php"; ?>
            <section class="article-list">

                <div class="container">
                    <div class="intro">
                        <h2 class="text-center">T-SHIRT</h2>

                    </div>

                    <?php


                    // Calcul nombre images par page:
                    $per_page = 8;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'] - 1;
                        $offset = $page * $per_page;
                    } else {
                        $page = 0;
                        $offset = 0;
                    }


                    // Compter le nombre total images dans la table
                    $image_produit = "SELECT count(idproduit)FROM produit ORDER by idproduit ASC";
                    $result = mysqli_query($bdd, $image_produit);
                    $row = mysqli_fetch_array($result);
                    $total_images = $row[0];

                    // Calcul nombre de pages
                    if ($total_images > $per_page) { //si plus d'une page
                        $pages_total = ceil($total_images / $per_page);
                        $page_up = $page + 2;
                        $page_down = $page;
                        $display = '';
                    } else { //sinon si on a qu'une seule page
                        $pages = 1;
                        $pages_total = 1;
                        $display = ' class="display-none"';
                    }

                    echo '<h2' . $display . '>Page ';
                    echo $page + 1 . ' of ' . $pages_total . '</h2>';
                    $i = 1;
                    echo '<div id="pageNav"' . $display . '>';
                    if ($page) {
                        echo '<a href="produit1.php"><button class="btn btn-secondary btn-sm"><<</button></a>';
//bouton pour page pred [<]
                        echo '<a href="produit1.php?page=' . $page_down . '"><button class=" btn btn-secondary btn-sm"><</button></a>';
                    }

                    for ($i = 1; $i <= $pages_total; $i++) {
                        if (($i == $page + 1)) {
                            echo '<a href="produit1.php?page=' . $i . '"><button class="active btn btn-secondary btn-sm">' . $i . '</button></a>';
                        }

                        if (($i != $page + 1) && ($i <= $page + 3) && ($i >= $page - 1)) {
                            echo '<a href="produit1.php?page=' . $i . '"><button class="btn btn-secondary btn-sm">' . $i . '</button></a>';
                        }
                    }

                    if (($page + 1) != $pages_total) {
                        echo '<a href="produit1.php?page=' . $page_up . '"><button class="btn btn-secondary btn-sm">></button></a>';
                        echo '<a href="produit1.php?page=' . $pages_total . '"><button class="btn btn-secondary btn-sm">>></button></a>';
                    }


                    echo "</div>";
                    echo '<div id="gallery">';
                    ?>
                    <div class="row articles">
                        <?php
                        $result = mysqli_query($bdd, "SELECT * FROM produit WHERE idcat=1 ORDER BY idproduit ASC LIMIT $offset, $per_page");
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-sm-6 col-md-3 card item">
                                <a href="conf_reservation.php?id=<?php echo $row["idproduit"] ?>"><img class="img-fluid"
                                                                                                       src="image_webshop/<?php echo $row["image"]; ?>"></a>
                                <h3 class="name"><?php echo $row["produit"]; ?></h3>
                                <p class="description"><br><?php echo $row["prix"] ?>€<br><br></p>
                                <a class="btn" href="conf_reservation.php?id=<?php echo $row["idproduit"] ?>">Réserver<i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <?php
                        }

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
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<?php include('footer.php'); ?>
</body>

</html>
