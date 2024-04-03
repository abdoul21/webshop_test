<?php include("bdd.php");
session_start();
if ($_SESSION["id_role"] == 2) {
    $sessionpre = $_SESSION['prenom'];
    $sql = "SELECT * FROM reservation where Nomclient='" . $sessionpre . "'";
    $result = mysqli_query($bdd, $sql);

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Webshop list des reservation</title>
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
        <?php include "navmembre.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav.php" ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Mes réservations</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Produit</p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                 aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>NC</th>
                                        <th>Nom</th>
                                        <th>Produit</th>
                                        <th>Date de commande</th>
                                        <th>Staute</th>
                                        <th>Quantiter</th>
                                        <th>Prix</th>
                                        <th>Annulaie</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    while ($donner = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $donner["NC"] ?></td>
                                            <td><?php echo $donner["Produit"] ?></td>
                                            <td><img src="image_webshop/<?php echo $donner["image"] ?>" height="50em">
                                            </td>
                                            <td><?php echo $donner["date"] ?></td>
                                            <td><?php echo $donner["statue"] ?></td>
                                            <td><?php echo $donner["qte"] ?></td>
                                            <td><?php echo $donner["prix"] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>

                                </table>
                            </div>

                            <!-- //bas pge du tableau
                            <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of
                    27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span
                                        aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                        aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>-->
                        </div>
                    </div>
                </div>
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
    </body>

    </html>
    <?php
} else {
    echo '<script>document.location.href = "403.html"</script>';
}
?>