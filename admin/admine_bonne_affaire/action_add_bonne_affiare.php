<?php
include "../../bdd.php";
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {

    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body>
    <?php
    if (isset($_POST['ajout'])) { //vérification du bouton ajout


        $titre = htmlentities($_POST["titre"], ENT_QUOTES, "utf-8");
        $date = $_POST["date"];
        $poucentage = htmlentities($_POST["pourcentage"], ENT_QUOTES, "utf-8");
        $date_fin = $_POST["date_fin"];
        $newDate = date("Y-m-d", strtotime($date));

        //convertis la date et le temps en secondes
        $sec = strtotime($date_fin);
        //convertis secondes dans un format spécifique
        $newDate_fin = date("Y-m-d H:i:s", $sec);
        //Ajoute des secondes à l'heure

        //echo "test $newDate_fin";


        $messeror = "Verifier les champ "; //Un message d'erreur s'affiche si le champ est n'est pas rempli ou la promo est supérieur à 20%
        if (empty($titre) || empty($date) || empty($poucentage <= 20) || empty($date_fin)) {
            if (empty($titre)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='ajout_bonne_affaire.php'</script>";
            }
            if (empty($date)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='ajout_bonne_affaire.php'</script>";
            }
            if (empty($poucentage <= 20)) {
                echo "<script type='text/javascript'>alert('erreur pourcentage supérieure à 20 %');document.location.href ='ajout_bonne_affaire.php'</script>";
            }
            if (empty($date_fin)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='ajout_bonne_affaire.php'</script>";
            }
        } else {

            $insere = "insert into bonne_affaire (id_bonne_affaire,titre_promos,date_fin_promo,pourcentage_promos,date) values (null,'$titre','$newDate_fin','$poucentage','$newDate')";
            mysqli_query($bdd, $insere); //requête pour insérer les données dans la base de donnée


            echo "<script type='text/javascript'>alert('bonne affaire ajouter'); document.location.href = 'admine_bonne_affaire.php'</script>";


            mysqli_close($bdd);
        }
    }
    ?>

    </body>

    </html>
<?php } else {
    header('Location: ../../403.html');
    die();
}
?>