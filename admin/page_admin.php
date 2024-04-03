<?php
include "../bdd.php";
session_start();
if ($_SESSION['id_role']==1 && $_SESSION['idmembre']){


$sql = "SELECT idreserv, date, `Produit`, `statue` FROM `reservation` WHERE statue= 'non-livrer'";
$result = mysqli_query($bdd, $sql);
    if (isset($_POST['confirmation'])) {

        $statue = "livrer";
        $id = htmlentities($_POST['id'], ENT_QUOTES,'UTF-8');

        try {

            $stmt = $conn->prepare("SELECT idreserv FROM reservation WHERE idreserv='$id'");
            $stmt->execute();
            $resultat = $stmt->fetch();




            $sql = "UPDATE reservation SET  statue='" . $statue . "' WHERE idreserv='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);

        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        //echo "<script type='text/javascript'>alert('votre reservation a était confirmer'); document.location.href = 'page_admin.php'</script>";

    }


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil Admin - Webshop</title>
    <?php include ("../icon_ongle.php")?>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/untitled-1.css">
    <link rel="stylesheet" href="../assets/css/untitled-2.css">
    <link rel="stylesheet" href="../assets/css/untitled-5.css">
    <link rel="stylesheet" href="../assets/css/untitled-6.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
    include "nav_admin.php";
    ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Réservation des produits non-livré</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                                aria-describedby="dataTable_info">

                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>


                                            <th>Date de commande</th>
                                            <th>Produit</th>
                                            <th>Statut</th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php

                                        // AFFICHAGE DE LA TABLE PAR UNE BOUCLE
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr class="">
                                            <td><?php echo $row["date"]; ?> </td>
                                            <td><?php echo $row["Produit"]; ?> </td>
                                            <td><?php echo $row["statue"]; ?> </td>

                                            <td>

                                                <a href="confirme_livrer.php?id=<?php echo $row["idreserv"] ?>">
                                                    <button class="btn btn-dark" type="button"
                                                        name="button">confirmation</button></a>
                                            </td>

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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>
<?php
} else{
    header('Location: ../403.html');

}

?>