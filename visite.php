<?php
include_once 'bdd.php';
// Récupérer l'adresse IP du visiteur
$ip = $_SERVER['REMOTE_ADDR'];

// Vérifier si l'adresse IP existe déjà dans la base de données
$sql = "SELECT * FROM visite WHERE adresse_ip = '$ip'";
$result = $bdd->query($sql);


if ($result->num_rows == 0) {
    // Si l'adresse IP n'existe pas, insérer un nouveau visiteur
    $sql_insert = "INSERT INTO visite (adresse_ip, conter) VALUES ('$ip', 1)";
    if ($bdd->query($sql_insert) === FALSE) {
        echo "Error inserting record: " . $bdd->error;
    }
}


// Sélectionner le nombre total de visites

$sql_total = "SELECT adresse_ip, COUNT(*) AS total_visits FROM visite GROUP BY adresse_ip";
$result_total = $bdd->query($sql_total);
$row_total = $result_total->fetch_assoc();
$totalVisits = $row_total['total_visits'];

// Afficher le nombre total de visites
echo "Nombre total de visites : $totalVisits";

// Fermer la connexion à la base de données
$bdd->close();
?>
