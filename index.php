<?php include("bdd.php");
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
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
            width: 50%;
            height: 50%;
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
                        <h2 class="text-center">BIENVENUE SUR WEBSHOP ! </h2>
                    </div>

                    <div id="demo" class="carousel slide" data-ride="carousel"
                         style="background-color: #858796; padding: 2%;">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner" align="center">

                            <div class="carousel-item active">
                                <a href="">
                                    <img src="image_webshop/girls-only_218889_G2133-1_NOIR_20200609T155930_01.jpg"
                                         alt="image_webshop">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <img src="image_webshop/tommy-hilfiger_366482_UW0UW04153_YBR_20230329T151006_01.jpg"
                                     alt="image_webshop">
                            </div>
                            <div class="carousel-item">
                                <img src="image_webshop/hugo_366531_50490577_100_20230329T151314_01.jpg"
                                     alt="image_webshop">
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev"><span
                                    class="carousel-control-prev-icon"></span></a>
                        <a class="carousel-control-next" href="#demo" data-slide="next"><span
                                    class="carousel-control-next-icon"></span></a>
                    </div>

                    <div class="row articles">
                        <p>WEBSHOP est une boutique en ligne implantée à Port Louis, Ile Maurice
                            depuis 2018 qui vend des produits haut de gamme. Cette entrepr ise
                            accueille aussi des clients de plusieurs pays de la région tels que Mayotte,
                            Comores, Réunion, Madagascar et autres.</p>
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
<?php
include_once 'visite.php';
?>
<?php include('footer.php'); ?>
</body>

</html>