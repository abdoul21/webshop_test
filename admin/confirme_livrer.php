<?php
include "../bdd.php";
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {

//récuperer id depuis url
    $id = $_GET['id'];

//extraction des données associées avec ce ID particulierar
    $result = mysqli_query($bdd, "SELECT * FROM reservation WHERE idreserv=$id");

// lecture du curseur
    while ($res = mysqli_fetch_array($result)) {
        $produit = $res['Produit'];
        $date = $res['date'];


    }
    $statue = "livrer";
    $mja = "UPDATE reservation SET  statue='" . $statue . "' WHERE idreserv='" . $id . "'";


    echo "<script type='text/javascript'>alert('confirmation de la commande validé'); document.location.href = 'accueil_admin.php'</script>";

// exécuter la requête avec la fonction PHP
    mysqli_query($bdd, $mja);

    mysqli_close($bdd);
} else {
    header('Location: ../../403.html');
    exit();
}