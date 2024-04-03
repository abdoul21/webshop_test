<?php
// mettre en ligne la connexion avec la base de données
include ("../../bdd.php");
session_start();
if ($_SESSION['id_role']==1 && $_SESSION['idmembre']) {
    if (isset($_POST['modifier'])) {
//On créer des variables avec les données du formulaire et "htmlentities" pour empécher les injections javascript
        $tmpName = htmlentities($_FILES['file']['tmp_name'], ENT_QUOTES, "utf-8");
        $name = htmlentities($_FILES['file']['name'], ENT_QUOTES, "utf-8");
        $size = htmlentities($_FILES['file']['size'], ENT_QUOTES, "utf-8");
        $error = htmlentities($_FILES['file']['error'], ENT_QUOTES, "utf-8");

        $id = $_POST["id"];
        $produit = htmlentities($_POST["produit"], ENT_QUOTES, "utf-8");
        $description = htmlentities($_POST["description"], ENT_QUOTES, "utf-8");
        $prix = htmlentities($_POST["prix"], ENT_QUOTES, "utf-8");
        $marque = htmlentities($_POST["marque"], ENT_QUOTES, "utf-8");
        $idcat = htmlentities($_POST["idcat"], ENT_QUOTES, "utf-8");
        $qte = htmlentities($_POST["qte"], ENT_QUOTES, "utf-8");
        $image = $name;
        $messero1 = "Verifier les champ description ";
        $messero2 = "Verifier les champ produit ";
        $messero3 = "Verifier les champ prix ";
        $messero4 = "Verifier les champ marque";
        $messero5 = "Verifier les champ coategori";
        $messero6 = "Verifier les champ image";
        $messero7 = "Verifier les champ de la quantité";
        if (empty($description) || empty($produit) || empty($prix) || empty($marque) || empty($idcat) || empty($image) || empty($qte)){
            if (empty($description)) {
                echo "<script type='text/javascript'>alert('$messero1');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($produit)) {
                echo "<script type='text/javascript'>alert('$messero2');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($prix)) {
                echo "<script type='text/javascript'>alert('$messero3');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($marque)) {
                echo "<script type='text/javascript'>alert('$messero4');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($idcat)) {
                echo "<script type='text/javascript'>alert('$messero5');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($image)) {
                echo "<script type='text/javascript'>alert('$messero6');document.location.href ='modif_article.php?id=$id'</script>";
            }if (empty($qte)) {
                echo "<script type='text/javascript'>alert('$messero7');document.location.href ='modif_article.php?id=$id'</script>";
            }
        }else {

// requête de modification 
        $mja = "UPDATE produit SET  description='" . $description . "', produit='" . $produit . "',prix='" . $prix . "',image='" . $image . "', marque='" . $marque . "', idcat='" . $idcat . "', qte='" . $qte . "' WHERE idproduit='" . $id . "'";
        move_uploaded_file($tmpName, './../../image_webshop/' . $name);

        echo "<script type='text/javascript'>alert('Produit modifier'); document.location.href = 'page_admin_produit.php'</script>";

// exécuter la requête avec la fonction PHP
        mysqli_query($bdd, $mja);

        mysqli_close($bdd);
        }
    }
} else{
    echo "<script > document.location.href = '../../403.html'</script>";
die();
}
?>