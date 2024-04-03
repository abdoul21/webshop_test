<?php
include "bdd.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Reservation</title>
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
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include 'bdd.php'; ?>

            <?php include("nav.php"); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4" style="text-align: center;">Confirmer la reservation</h3>
                <div class="row">
                    <div class="col"></div>

                    <?php

                    //récuperer id depuis url
                    $id = $_GET['id'];

                    //extraction des données associées avec ce ID particulierar
                    $result = mysqli_query($bdd, "SELECT * FROM produit WHERE idproduit=$id");

                    // lecture du curseur
                    while ($res = mysqli_fetch_array($result))
                    {
                    //$image = $res['image'];
                    //$description = $res['description'];
                    //$marque = $res['marque'];
                    //$prix = $res['prix'];

                    ?>


                    <div class=" col-6" style="">
                        <form action="confirmation_com.php" method="post">
                            <div class=" d-flex justify-content-center">
                                <img class="" src="image_webshop/<?php echo $res["image"]; ?>" style="width:50%;"
                                     srcset="">
                            </div>

                            <ul class="list-group list-group-flush  ">
                                <li class="list-group-item d-flex justify-content-center  " style="background-color: #f8f9fc">
                                    <strong><?php echo $res["produit"]; ?></strong></li>
                                <li class="list-group-item d-flex justify-content-center" style="background-color: #f8f9fc">
                                    <strong><?php echo $res["description"]; ?></strong></li>
                                <li class="list-group-item d-flex justify-content-center" style="background-color: #f8f9fc">
                                    <strong><?php echo $res["marque"]; ?></strong></li>

                                <?php if (isset($_GET["prix"])): ?> <!-- si promotion prix existe, le prix = promotion -->
                                    <li class="list-group-item d-flex justify-content-center" style="background-color: #f8f9fc">Prix uniter:
                                        <strong><?php echo $_GET["prix"]; ?>€</strong></li>
                                <?php else: ?>
                                <!--  sinon prix normal-->
                                    <li class="list-group-item d-flex justify-content-center" style="background-color: #f8f9fc">Prix uniter:
                                        <strong> <?php echo $res["prix"]; ?>€</strong></li>
                                <?php endif ?>
                                <?php if (empty($res["qte"])): ?>
                                <div class="alert alert-dark"  role="alert">
                                    Rupture de stock
                                </div>
                                <?php else: ?>
                                <li class="list-group-item d-flex justify-content-center" style="background-color: #f8f9fc">Quantiter : <input name="qte" type="number" min="1" />
                                </li>
                                <?php endif ?>
                            </ul>
                            <div class="card-body d-flex justify-content-center" style="background-color: #f8f9fc">
                                <?php if (empty($res["qte"])): ?>
                                    <a class="btn btn-secondary" href="javascript:history.go(-1)">Retour</a>
                                <?php else: ?>
                                    <input name="produit" type="hidden" value="<?php echo $res["produit"]; ?>"/>
                                    <?php if (isset($_GET["prix"])): ?> <!-- SI LA METHOD GET prix existe, le prix = promotion -->
                                        <input name="prix" type="hidden" value="<?php echo $_GET["prix"]; ?>"/>
                                    <?php else: ?>
                                        <input name="prix" type="hidden" value="<?php echo $res["prix"]; ?>"/>
                                    <?php endif ?>

                                    <input name="image" type="hidden" value="<?php echo $res["image"]; ?>"/>

                                     <button class="btn btn-secondary d-block btn-user w-50 " type="submit"
                                            style="margin-right: 2%">confirmer la reservation
                                    </button>
                                    <a class="btn btn-secondary" href="javascript:history.go(-1)">annuler</a>
                                    <a class="btn btn-secondary" href="ajout_panier.php?id=<?=$res['idproduit']?>">ajouter au panier</a>
                                <?php endif; ?>

                        </form>
                    </div>

                </div>
                <div class="col"></div>


            </div>

        <?php

        }

        ?>

        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
        </div>
    </footer>
</div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<?php include("footer.php"); ?>
</body>

</html>