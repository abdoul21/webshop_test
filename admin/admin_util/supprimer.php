<?php

//********************* POUR LA SUPPRESSION *************************

$verif_sup = 0;
//On vérifie si le bouton supprimer est appuyer
if (isset($_POST['supprimer'])) {

    //On récupère les valeurs qu'on a saisir dans le formulaire.
    $idmembre = $_POST['idmembre'];

    //Preparation de la requête de suppresion dans la base :
    $stmt = $conn->prepare("DELETE FROM utilisateurs WHERE idmembre=?");
    $stmt->bindParam(1, $idmembre);

    //On va exécuter notre requête
    $stmt->execute();
    $verif_sup = 1;

}

