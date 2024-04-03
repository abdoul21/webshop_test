<?php

//********************* POUR LA MODIFICATION *************************

$verif = 0;

//On vérifie si le bouton modifier est appuyer
if (isset($_POST['modifier'])) {

    //On récupère les valeurs qu'on a saisi dans le formulaire.

    $idmembre = $_POST['idmembre'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    //Preparation de la requête de modification dans la base :
    $stmt = $conn->prepare("UPDATE utilisateurs SET nom=?, prenom=?,sexe=?,age=?,adresse=?,email=?,telephone=? WHERE idmembre=$idmembre");
    $stmt->bindparam(1, $nom);
    $stmt->bindparam(2, $prenom);
    $stmt->bindparam(3, $sexe);
    $stmt->bindparam(4, $age);
    $stmt->bindparam(5, $adresse);
    $stmt->bindparam(6, $email);
    $stmt->bindparam(7, $telephone);

    //On va exécuter notre requête
    $stmt->execute();
    $verif = 1;

}



