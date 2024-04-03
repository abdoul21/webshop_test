<?php
// mettre en ligne la connexion avec la base de données
include("bdd.php");

// récupérer les contenus des variables formulaires
$nom = $_POST["nom"];
$email = $_POST["email"];
$prenom = $_POST["prenom"];
$message = $_POST["message"];

// préparer votre requête pour insérer des données dans la table
$inserer = "insert into contact (nom,prenom,email,message) values ('$nom','$prenom','$email','$message')";

// exécuter la requête avec la focntion PHP
mysqli_query($bdd, $inserer);

// fermeture de la connexion avec la base de données
mysqli_close($bdd);
echo "<script type='text/javascript'>alert('Votre message a était envoiyé'); document.location.href = 'contact.php'</script>";
?>