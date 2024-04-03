<?php include "../../bdd.php";
session_start(); 
if ($_SESSION['id_role']==1 && $_SESSION['idmembre']){
    //requête pour sélectionner tout les bonnes affaire ça les met en ordre de l'id décroissant
    $sql = "SELECT * FROM bonne_affaire ORDER BY id_bonne_affaire DESC "; 
    $result = mysqli_query($bdd, $sql);
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin produit</title>
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
    <link rel="stylesheet" href="../../assets/css/untitled-4.css">
    <link rel="stylesheet" href="../../assets/css/untitled-5.css">
    <link rel="stylesheet" href="../../assets/css/untitled-6.css">
    <link rel="stylesheet" href="../../assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
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
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle"
                                                                    type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Bonne Affaire</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                                aria-describedby="dataTable_info">

                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>N° de la bonne affaire</th>
                                            <th>Titre de la bonne affaire</th>
                                            <th>date de fin </th>
                                            <th>pourcentage</th>
                                            <th>date</th>
                                            <th>Modifier</th>
                                            <th>Suprimer</th>
                                            <th><a href="ajout_bonne_affaire.php"><button class="btn btn-secondary"
                                                        type="button" name="button">Ajouter</button></a></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php

                                        // AFFICHAGE DE LA TABLE PAR UNE BOUCLE
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr class="">
                                            <td><?php echo $row["id_bonne_affaire"] ?> </td>
                                            <td><?php echo $row["titre_promos"] ?> </td>
                                            <td><?php echo $row["date_fin_promo"] ?></td>
                                            <td><?php echo $row["pourcentage_promos"] ?> </td>
                                            <td><?php echo $row["date"] ?> </td>
                                            <td> <a
                                                    href="modif_bonne_affaire.php?id=<?php echo $row["id_bonne_affaire"] ?>">
                                                    <button class="btn btn-dark" type="button"
                                                        name="button">Modifier</button></a> </td>

                                            <td> <a
                                                    href="supprime_bonne_affaire.php?id=<?php echo $row["id_bonne_affaire"] ?>"><button
                                                        class="btn btn-danger" type="button"
                                                        name="button">Supprimer</button></a> </td>
                                            <td>  </td>
                                        </tr>
                                        <?php
                                    }

                                    ?>
                                    </tbody>
                                </table>
                                <?php
                                mysqli_free_result($result);
                                mysqli_close($bdd);
                                ?>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
</body>

</html>
<?php } else{
    header('Location: ../../403.html');
    exit();
}
?>