<?php
include "../../bdd.php";
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {

//récuperer id depuis url
    $id = $_GET['id'];

//extraction des données associées avec ce ID particulierar
    $result = mysqli_query($bdd, "SELECT * FROM produit WHERE idproduit=$id");

// lecture du curseur
    while ($res = mysqli_fetch_array($result)) {
        $produit = $res['produit'];
        $description = $res['description'];
        $prix = $res['prix'];
        $marque = $res['marque'];
        $idcat = $res['idcat'];
        $image = $res['image'];
        $qte = $res['qte'];

    }

// Récupérer les catégories depuis la base de données
    $resultat = mysqli_query($bdd, "SELECT id_bonne_affaire, titre_promos FROM bonne_affaire");
//$categories = array();


    if (mysqli_num_rows($resultat) > 0) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $categories[] = $row;
        }
    }

    if (isset($_POST['modifier'])) {


//On créer des variables avec les données du formulaire et "htmlentities" pour empécher les injections javascript
        $tmpName = htmlentities($_FILES['file']['tmp_name'], ENT_QUOTES, "utf-8");
        $name = htmlentities($_FILES['file']['name'], ENT_QUOTES, "utf-8");
        $size = htmlentities($_FILES['file']['size'], ENT_QUOTES, "utf-8");
        $error = htmlentities($_FILES['file']['error'], ENT_QUOTES, "utf-8");

        $id = $_POST["id"];
        $produit = htmlentities($_POST["produit"], ENT_QUOTES, "utf-8");
        $description = htmlentities($_POST["description"], ENT_QUOTES, "utf-8");
        $prix = htmlentities($_POST["prix"], ENT_QUOTES, "utf-8");
        $marque = htmlentities($_POST["marque"], ENT_QUOTES, "utf-8");
        $idcat = htmlentities($_POST["idcat"], ENT_QUOTES, "utf-8");
        $qte = htmlentities($_POST["qte"], ENT_QUOTES, "utf-8");
        $promos = htmlentities($_POST["promo"], ENT_QUOTES, "utf-8");
        $image = $name;

        $messero1 = "Verifier les champ description ";
        $messero2 = "Verifier les champ produit ";
        $messero3 = "Verifier les champ prix ";
        $messero4 = "Verifier les champ marque";
        $messero5 = "Verifier les champ coategori";
        $messero6 = "Verifier les champ image";
        $messero7 = "Verifier les champ de la quantité";

        $select_justif_null = isset($_POST['promo']) ? $_POST['promo'] : null;
        $changerImage = isset($_POST["changer_image"]);


        if (empty($description) || empty($produit) || empty($prix) || empty($marque) || empty($idcat) || empty($qte)) {
            if (empty($description)) {
                echo "<script type='text/javascript'>alert('$messero1');document.location.href ='modif_article.php?id=$id'</script>";
            }
            if (empty($produit)) {
                echo "<script type='text/javascript'>alert('$messero2');document.location.href ='modif_article.php?id=$id'</script>";
            }
            if (empty($prix)) {
                echo "<script type='text/javascript'>alert('$messero3');document.location.href ='modif_article.php?id=$id'</script>";
            }
            if (empty($marque)) {
                echo "<script type='text/javascript'>alert('$messero4');document.location.href ='modif_article.php?id=$id'</script>";
            }
            if (empty($idcat)) {
                echo "<script type='text/javascript'>alert('$messero5');document.location.href ='modif_article.php?id=$id'</script>";
            }
            if (empty($qte)) {
                echo "<script type='text/javascript'>alert('$messero7');document.location.href ='modif_article.php?id=$id'</script>";
            }
        } else {

            if ($select_justif_null === null || $select_justif_null === "") {
                // verification du check box imag
                if ($changerImage) {
                    if (empty($image)) {
                        echo "<script type='text/javascript'>alert('$messero6');document.location.href ='modif_article.php?id=$id'</script>";
                    } else {
                        move_uploaded_file($tmpName, './../../image_webshop/' . $name);

                        $mja1 = "UPDATE produit SET  id_promos=null, description='" . $description . "', produit='" . $produit . "',prix='" . $prix . "', marque='" . $marque . "', idcat='" . $idcat . "', qte='" . $qte . "',image='" . $image . "' WHERE idproduit='" . $id . "'";
                        echo "<script type='text/javascript'>alert('Produit modifier'); document.location.href = 'page_admin_produit.php'</script>";

                        mysqli_query($bdd, $mja1);

                        mysqli_close($bdd);
                    }

                }
                // requête de modification
                $mja = "UPDATE produit SET id_promos=null, description='" . $description . "', produit='" . $produit . "',prix='" . $prix . "', marque='" . $marque . "', idcat='" . $idcat . "', qte='" . $qte . "' WHERE idproduit='" . $id . "'";

                echo "<script type='text/javascript'>alert('Produit modifier'); document.location.href = 'page_admin_produit.php'</script>";

                mysqli_query($bdd, $mja);
                mysqli_close($bdd);
            } else {
                if ($changerImage) {
                    if (empty($image)) {
                        echo "<script type='text/javascript'>alert('$messero6');document.location.href ='modif_article.php?id=$id'</script>";
                    } else {
                        move_uploaded_file($tmpName, './../../image_webshop/' . $name);

                        $mja1 = "UPDATE produit SET  id_promos='" . $promos . "', description='" . $description . "', produit='" . $produit . "',prix='" . $prix . "', marque='" . $marque . "', idcat='" . $idcat . "', qte='" . $qte . "',image='" . $image . "' WHERE idproduit='" . $id . "'";
                        echo "<script type='text/javascript'>alert('Produit modifier'); document.location.href = 'page_admin_produit.php'</script>";

                        mysqli_query($bdd, $mja1);

                        mysqli_close($bdd);
                    }

                }
                // requête de modification
                $mja = "UPDATE produit SET id_promos='" . $promos . "', description='" . $description . "', produit='" . $produit . "',prix='" . $prix . "', marque='" . $marque . "', idcat='" . $idcat . "', qte='" . $qte . "' WHERE idproduit='" . $id . "'";

                echo "<script type='text/javascript'>alert('Produit modifier'); document.location.href = 'page_admin_produit.php'</script>";

                mysqli_query($bdd, $mja);
                mysqli_close($bdd);
            }
        }

    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Accueil Admin - Brand</title>
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

                    <li class="nav-item"><a class="nav-link" href="page_admin_produit.php"><i
                                    class="fas fa-user"></i><span>Gestion des article</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="../admin_contacte/page_admin_contacte.php"><i
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
                    <h3 class="text-dark mb-4">Modifier un article</h3>
                    <div class="card shadow" style="margin: 136px;margin-top: 68px;color: var(--bs-gray-900);">
                        <div class="card-header py-3" style="color: var(--bs-gray-900);">
                            <p class="text-primary m-0 fw-bold" style="color: var(--bs-purple);">Modifier les champs
                                d'un vetement</p>
                        </div>
                        <div class="card-body">
                            <form class="" action="" enctype="multipart/form-data" method="POST">
                                <div class="row mb-3">
                                    <div class="mb-3">
                                        <div class="u-form-group u-form-radiobutton u-label-top u-form-group-1">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <input type="radio" name="idcat" value="1" required="required">
                                                        <label class="u-label u-text-palette-5-dark-1 u-label-1">teeshirt</label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="mb-3">
                                                        <input type="radio" name="idcat" value="2" required="required">
                                                        <label class="u-label u-text-palette-5-dark-1 u-label-2">pantalon</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="form-label" for="produit"><strong>Produit</strong></label>
                                        <input id="exampleInputEmail-2" class="form-control" type="text"
                                               value="<?php echo "$produit" ?>" aria-describedby=""
                                               placeholder="Produit" name="produit" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="marque"><strong>Quantité</strong></label>
                                        <input class="form-control " type="number" placeholder="Quantité"
                                               value="<?php echo "$qte" ?>" name="qte" required/>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="form-label" for="prix"><strong>Prix</strong></label>
                                        <input class="form-control " type="number" placeholder="Prix"
                                               value="<?php echo "$prix" ?>" name="prix" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="marque"><strong>Marque</strong></label>
                                        <input class="form-control " type="text" placeholder="Marque"
                                               value="<?php echo "$marque" ?>" name="marque" required/>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="image"><strong>Description</strong></label>
                                    <input id="exampleInputEmail" class="form-control " type="text" aria-describedby=""
                                           value="<?php echo "$description" ?>" placeholder="Description"
                                           name="description" required/>
                                </div>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="promotion">Promotion</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="promo">
                                        <option value="">Pas de promo</option>
                                        <?php
                                        // Affiche les options de la liste déroulante avec les catégories
                                        foreach ($categories as $categorie) {
                                            $selected = ($categorie['id'] == $row['id_bonne_affaire']) ?: "";
                                            echo "<option value='{$categorie['id_bonne_affaire']}' $selected>{$categorie['titre_promos']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="file"><strong>Image</strong></label>
                                    <div class="mb-3">
                                        <label class="" for="changer_image">Changer l'image:</label>
                                        <input type="checkbox" name="changer_image">
                                    </div>
                                    <input id="exampleInputEmail" class="form-control " type="file" value=""
                                           name="file"/>
                                    <input type="hidden" value="<?php echo "$id" ?>" name="id"/>
                                </div>


                                <div class="row align-content-center ">
                                    <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-end">
                                        <button class="btn bg-gradient-primary" type="submit" name="modifier">modifier
                                        </button>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-start"><a
                                                class="btn bg-gradient-primary"
                                                href="page_admin_produit.php">annuler</a>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    exit();
}
?>