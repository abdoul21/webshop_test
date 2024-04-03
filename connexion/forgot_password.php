<?php
include "../bdd.php";

//Si methode post ajouter existe ou le bouton ajouter est appuyé
if (isset($_POST['mja_pass'])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $id_role = 2;


    $sql = "SELECT email,idmembre,nom,prenom,telephone,id_role FROM utilisateurs WHERE email='$email'";
    $result = mysqli_query($bdd, $sql);

    while ($res = mysqli_fetch_array($result)) {
        $b_nom = $res['nom'];
        $b_prenom = $res['prenom'];
        $b_telephone = $res['telephone'];
        $b_email = $res['email'];
        $b_idmembre = $res['idmembre'];
        $b_id_role = $res['id_role'];
    }

    if ($nom != $b_nom || $prenom != $b_prenom || $telephone != $b_telephone || $id_role != $b_id_role) {

        echo "<script>alert('les information ne son pas bonne');</script>";
        echo "<script>document.location.href = 'forgot-password.html';</script>";
    } else {
        session_start();
        $_SESSION['idmembre'] = $b_idmembre;
        $_SESSION['prenom'] = $b_prenom;
        $_SESSION['nom'] = $b_nom;
        $_SESSION['id_role'] = $b_id_role;
        //echo $_SESSION['nom'];
        $message = "Vos information son vous Allez changer votre mot de passe";
        echo "<script type='text/javascript'>alert('$message'); document.location.href = 'maj_pass.php'</script>";
    }


}


?>

