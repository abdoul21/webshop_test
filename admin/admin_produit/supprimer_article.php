<?php
include("../../bdd.php");
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {

    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>supprimer</title>
        <?php include("../../icon_ongle.php"); ?>

    </head>

    <body>
    <?php


    $idproduit = $_GET['id']; //récupérer l'id avec l'url
    echo "<script type='text/javascript'>alert('produit suprimer'); document.location.href = 'page_admin_produit.php'</script>";
    // requête de suppression
    $sql = "DELETE FROM produit WHERE idproduit=$idproduit";

    // exécuter la requête avec la fonction PHP
    mysqli_query($bdd, $sql);

    // fermeture de la connexion avec la base de données
    mysqli_close($bdd);

    ?>


    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    die();
} ?>