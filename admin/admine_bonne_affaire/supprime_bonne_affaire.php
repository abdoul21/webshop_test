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


    $id_bonne = $_GET['id']; //récupérer l'id avec l'url
    // requête de suppression
    $sql = "DELETE FROM bonne_affaire WHERE id_bonne_affaire=$id_bonne";

    // exécuter la requête avec la fonction PHP
    mysqli_query($bdd, $sql);
    echo "<script type='text/javascript'>alert('produit suprimer'); document.location.href = 'admine_bonne_affaire.php'</script>";
    // fermeture de la connexion avec la base de données
    mysqli_close($bdd);

    ?>


    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    die();
} ?>