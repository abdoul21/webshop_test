<?php
include("../../bdd.php");
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Ajout bonne affaire</title>

        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="../../assets/css/Article-List.css">
        <link rel="stylesheet" href="../../assets/css/untitled-1.css">
        <link rel="stylesheet" href="../../assets/css/untitled-2.css">
        <link rel="stylesheet" href="../../assets/css/untitled-3.css">
        <link rel="stylesheet" href="../../assets/css/untitled-4.css">
        <link rel="stylesheet" href="../../assets/css/untitled-5.css">
        <link rel="stylesheet" href="../../assets/css/untitled-6.css">
        <link rel="icon" type="image/x-icon" href="../../assets/img/Webshop.png">

        <link rel="stylesheet" href="../../assets/css/untitled.css">
    </head>

    <body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Admin</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="../accueil_admin.php"><i
                                    class="fas fa-tachometer-alt"></i><span>Accueil Admin</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admin_produit/page_admin_produit.php"><i
                                    class="fas fa-user"></i><span>Gestion des article</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admin_contacte/page_admin_contacte.php"><i
                                    class="fas fa-table"></i><span>Gestion des contact</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admin_util/page.admin.membre.php"><i
                                    class="far fa-user-circle"></i><span>Gestion des utilisateurs</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="admine_bonne_affaire.php"><i
                                    class="far fa-user-circle"></i><span>Gestion des bonne affaire</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../gestion_reservation/page_admin.php"><i
                                    class="far fa-user-circle"></i><span>Gestion des reservation</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../../deconnexion.php"><i
                                    class="fas fa-user-circle"></i><span>Déconnexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle"
                            type="button"></button>
                </div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Ajouter une Bonne affaire</h3>
                    <div class="card shadow" style="margin: 136px;margin-top: 68px;color: var(--bs-gray-900);">
                        <div class="card-header py-3" style="color: var(--bs-gray-900);">
                            <p class="text-primary m-0 fw-bold" style="color: var(--bs-purple);">remplir les champs</p>
                        </div>
                        <div class="card-body">
                            <form class="" action="action_add_bonne_affiare.php" enctype="multipart/form-data"
                                  method="POST">
                                <div class="row mb-3">


                                    <div class="col-sm-6">
                                        <label class="form-label" for="titre"><strong>Intitulé la
                                                promotion</strong></label>
                                        <input class="form-control " type="text" placeholder="tittre" name="titre"
                                               required autofocus/>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="form-label" for="prix"><strong>Date de debut</strong></label>
                                        <input class="form-control " type="date" name="date" required autofocus/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="pourcentage"><strong>Pourcentage de
                                                promotion</strong></label>
                                        <input class="form-control " type="number" placeholder="pourcentage"
                                               name="pourcentage" required autofocus/>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="form-label" for="date_fin"><strong>Date de fin</strong></label>
                                        <input id="exampleInputEmail" class="form-control " type="datetime-local"
                                               aria-describedby="" name="date_fin" required autofocus/>
                                    </div>

                                </div>


                                <div class="row align-content-center ">
                                    <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-end">
                                        <button class="btn bg-gradient-primary" type="submit" name="ajout">Ajouter
                                        </button>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-start"><a class=""
                                                                                          href="admine_bonne_affaire.php">
                                            <button type="button" class="btn bg-gradient-primary">Annuler</button>
                                        </a>
                                    </div>
                                </div>


                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    exit();
} ?>