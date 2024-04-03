<?php

//Connexion a la base de donnée
include '../bdd.php';

//Empécher les injections avec htmlentites()
$email = $_POST['email'];
$pwd = md5($_POST['password']);

//Selection des informations dans la base de données
$reponse = "SELECT * FROM utilisateurs WHERE email = '$email' AND password = '$pwd'";
$ligne = mysqli_query($bdd, $reponse);
//Verification du mot de passe en le comparant avec celui selectionné dans la base donnée hashé



//Nombre de ligne que retourne notre requete
$num_rows = mysqli_num_rows($ligne);

//Si on retroune une valeur vide
if (empty($num_rows)) {

    echo "<script type='text/javascript'>alert('adresse email ou/et le mot de passe est incorrecte'); document.location.href = 'login.html'</script>";
} //Sinon
else {

    $resultat = mysqli_fetch_array($ligne, MYSQLI_ASSOC);
    if ($resultat['id_role'] == 1) {
        session_start();

        $_SESSION['idmembre'] = $resultat['idmembre'];
        $_SESSION['prenom'] = $resultat['prenom'];

        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['id_role'] = $resultat['id_role'];
        echo "<script type='text/javascript'>alert('Vous êtes connecté comme admin'); document.location.href = '../admin/accueil_admin.php'</script>";
    }
    if ($resultat['id_role'] == 2) {
        session_start();
        $_SESSION['idmembre'] = $resultat['idmembre'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['id_role'] = $resultat['id_role'];
        echo "<script type='text/javascript'>alert('Vous êtes connecté comme membre'); document.location.href = '../produit.php'</script>";
    }
}

mysqli_close($bdd);

?>