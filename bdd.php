<?php
try {
    $host = "localhost";
    $login = "root";
    $pass = "";
    $dbname = "webshop_test";
    $bdd = mysqli_connect($host, $login, $pass, $dbname);

} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}


mysqli_set_charset($bdd, "utf8");
$conn = new PDO("mysql:host=$host;dbname=$dbname", $login, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
