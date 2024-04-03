<?php
include '../../bdd.php';
session_start();
include 'modifie.php';
include 'supprimer.php';

if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {
    $result = mysqli_query($bdd, "SELECT * FROM utilisateurs ORDER BY idmembre DESC");
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Utilisateurs</title>
        <link rel="icon" type="image/x-icon" href="../../assets/img/Webshop.png">
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

                    <li class="nav-item"><a class="nav-link" href="page.admin.membre.php"><i
                                    class="far fa-user-circle"></i><span>Gestion des utilisateurs</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admine_bonne_affaire/admine_bonne_affaire.php"><i
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Utilisateurs</h3>
                    </div>

                    <?php if (isset($verif) && $verif == 1): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Les informations ont bien été modifiées!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>

                    <?php if (isset($verif_sup) && $verif_sup == 1): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            L'utilisateur a bien été supprimé!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                                 aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Age</th>
                                        <th>Adresse</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Id_role</th>
                                        <th>Option_Admin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <!-- Si notre requete ne retourne pas de valeurs vide -->
                                        <?php if (!empty($result)): ?>
                                        <!-- On va parcourir les données qui sont dans la base afin de pouvoir les afficher -->
                                        <?php foreach ($result

                                        as $value): ?>
                                    <tr>
                                        <td><?php echo $value["idmembre"]; ?></td>
                                        <td><?php echo $value["nom"]; ?></td>
                                        <td><?php echo $value["prenom"]; ?></td>
                                        <td><?php echo $value["sexe"]; ?></td>
                                        <td><?php echo $value["age"]; ?></td>
                                        <td><?php echo $value["adresse"]; ?></td>
                                        <td><?php echo $value["email"]; ?></td>
                                        <td><?php echo $value["telephone"]; ?></td>
                                        <td><?php echo $value["id_role"]; ?></td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" class="btn btn-dark"
                                                    data-bs-target="#myModal<?php echo $value['idmembre'] ?>"
                                                    name="button">Modifier
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" class="btn btn-danger"
                                                    data-bs-target="#myModalSup<?php echo $value['idmembre'] ?>"
                                                    name="button">supprimer
                                            </button>
                                        </td>
                                    </tr>

                                    <?php endforeach ?>

                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Pas de données disponibles!</td>
                                        </tr>
                                    <?php endif ?>


                                    </tbody>
                                </table>
                            </div>
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

    <!-- MODAL -->
    <!-- On va parcourir les données qui sont dans la base afin de pouvoir les afficher -->
    <?php foreach ($result as $value): ?>

        <!-- MODAL MODIFIER -->
        <div class="modal fade" id="myModal<?php echo $value["idmembre"]; ?>" tabindex="-1"
             aria-labelledby="Modification" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="page.admin.membre.php">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modification</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="form-row">
                                <input type="hidden" name="idmembre" class="form-control"
                                       value="<?php echo $value["idmembre"]; ?>">
                                <div class="form-group col-md-6">
                                    <label>Nom</label>
                                    <input type="text" name="nom" class="form-control"
                                           value="<?php echo $value["nom"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Prenom</label>
                                    <input type="text" name="prenom" class="form-control"
                                           value="<?php echo $value["prenom"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sexe</label>
                                    <input type="text" name="sexe" class="form-control"
                                           value="<?php echo $value["sexe"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Age</label>
                                    <input type="text" name="age" class="form-control"
                                           value="<?php echo $value["age"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse" class="form-control"
                                           value="<?php echo $value["adresse"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"
                                           value="<?php echo $value["email"]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone</label>
                                    <input type="text" name="telephone" class="form-control"
                                           value="<?php echo $value["telephone"]; ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="modifier" class="btn btn-dark">Modifier</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL SUPRRIMER -->
        <div class="modal fade" id="myModalSup<?php echo $value["idmembre"]; ?>" tabindex="-1"
             aria-labelledby="Suppression" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Suppression</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" name="idmembre" class="form-control"
                                   value="<?php echo $value["idmembre"]; ?>">
                            <h4>Voulez-vous supprimer
                                <strong><?php echo $value["nom"] . " " . $value["prenom"]; ?></strong> définitivement?
                            </h4>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="supprimer" class="btn btn-primary">Supprimer</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    header('location: ../../403.html');
    exit();
}



