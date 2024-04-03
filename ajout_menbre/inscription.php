<?php
include "../bdd.php";

//Si methode post ajouter existe ou le bouton ajouter est appuyé
if (isset($_POST['ajouter'])) {
    $nom = htmlentities($_POST["nom"], ENT_QUOTES, 'UTF-8');
    $prenom = htmlentities($_POST["prenom"], ENT_QUOTES, 'UTF-8') ;
    $email = htmlentities($_POST["email"], ENT_QUOTES, 'UTF-8') ;
    $adresse = htmlentities($_POST["adresse"], ENT_QUOTES, 'UTF-8') ;
    $sexe = htmlentities($_POST["sexe"], ENT_QUOTES, 'UTF-8') ;
    $age = htmlentities($_POST["age"], ENT_QUOTES, 'UTF-8') ;
    $telephone = htmlentities($_POST["telephone"], ENT_QUOTES, 'UTF-8') ;
    $password = htmlentities($_POST["password"], ENT_QUOTES, 'UTF-8') ;
    $verif_mdp = htmlentities($_POST["password_repeat"], ENT_QUOTES, 'UTF-8') ;
    $id_role = 2;


    $sql = "SELECT email FROM utilisateurs WHERE email='$email'";
    $result = mysqli_query($bdd, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message_erro = "Lemail est déjà utilisé.";
        echo "<script>alert('Lemail est déjà utilisé.');</script>";
        echo "<script>document.location.href = 'register.html';</script>";
    } elseif ($password != $verif_mdp) {
        //on affichage un message d'information en javascript
        $message_erro = "les mots de passe ne sont pas identiques";
        echo "<script type='text/javascript'>alert('$message_erro'); document.location.href = 'register.html'</script>";


    } else {
        //On vérifie si le format de l'email est valide
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            //on hache le mot de passe avec un algorithme
            $pass_hache = md5($password);

            //on insere dans la base de donnée
            // préparer votre requête pour insérer des données dans la table
            $inserer = "insert into utilisateurs (nom,prenom,sexe,age,adresse,email,telephone,password,id_role) values ('$nom','$prenom','$sexe','$age','$adresse','$email','$telephone','$pass_hache',$id_role)";

            // exécuter la requête avec la focntion PHP
            mysqli_query($bdd, $inserer);

            // fermeture de la connexion avec la base de données
            mysqli_close($bdd);

            //on affichage un message d'information en javascript
            $message = $nom . " " . $prenom . " a été ajouté";

            echo "<script type='text/javascript'>alert('$message'); document.location.href = '../connexion/login.html'</script>";
        }
    }



}


?>

