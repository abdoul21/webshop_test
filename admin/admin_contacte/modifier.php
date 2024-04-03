<?php
include_once("../../bdd.php");
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {
    if (isset($_POST['modifier'])) {
        //On créer des variables avec les données du formulaire et "htmlentities" pour empécher les injections javascript
        $idcontact = htmlentities($_POST['id'], ENT_QUOTES, "utf-8");
        $message = htmlentities($_POST['message'], ENT_QUOTES, "utf-8");

        // vérifier les champs vides
        if (empty($message)) {


            if (empty($message)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
        } else {
            //mise à jour de la table
            $result = mysqli_query($bdd, "UPDATE contact SET message='$message' WHERE idcontact=$idcontact");


            //rediriger la page d'acceuil. Dans notre cas c'est la page page_admin_contacte.php
            header("Location: page_admin_contacte.php");
        }
    }
    ?>

    <?php
//récuperer id depuis url
    $id = $_GET['id'];

//extraction des données associées avec ce ID particulierar
    $result = mysqli_query($bdd, "SELECT * FROM contact WHERE idcontact=$id");

// lecture du curseur 
    while ($res = mysqli_fetch_array($result)) {
        $nom = $res['nom'];
        $prenom = $res['prenom'];
        $email = $res['email'];
        $message = $res['message'];
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Admin </title>

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
        <link rel="icon" type="image/x-icon" href="../../assets/img/Webshop.png">
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

                    <li class="nav-item"><a class="nav-link" href="page_admin_contacte.php"><i
                                    class="fas fa-table"></i><span>Gestion des contact</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admin_util/page.admin.membre.php"><i
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
                    <h3 class="text-dark mb-4">Modifier message</h3>
                    <div class="card shadow" style="margin: 136px;margin-top: 68px;color: var(--bs-gray-900);">
                        <div class="card-header py-3" style="color: var(--bs-gray-900);">
                            <p class="text-primary m-0 fw-bold" style="color: var(--bs-purple);">Modifier le message</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row mb-3">

                                    <div class="mb-3">
                                        <label class="form-label" for="nom">Nom :</label>

                                        <label class="form-label"
                                               for="nom"><strong><?php echo "$nom" ?></strong></label>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="prenom">Prénom :</label>

                                        <label class="form-label" for="prenom"><strong><?php echo "$prenom" ?></strong></label>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email :</label>
                                        <label class="form-label"
                                               for="email"><strong><?php echo "$email" ?></strong></label>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="image"><strong>Message</strong></label>
                                    <input id="exampleInputEmail" class="form-control " type="text" aria-describedby=""
                                           value="<?php echo "$message" ?>" placeholder="Description" name="message"
                                           required/>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" value="<?php echo "$id" ?>" name="id"/>
                                </div>
                                <div class="row align-content-center ">
                                    <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-end">
                                        <button class="btn bg-gradient-primary" type="submit" name="modifier">modifier
                                        </button>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-start"><a
                                                class="btn bg-gradient-primary "
                                                href="page_admin_contacte.php">annuler</a>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row"></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Webshop 2022</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    exit();

} ?>