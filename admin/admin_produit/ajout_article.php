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
    if (isset($_POST['ajout'])) {
//On créer des variables avec les données du formulaire et "htmlentities" pour empécher les injections javascript
        //pour les 4 premier variables, récupération des données de l'image
        $tmpName = htmlentities($_FILES['file']['tmp_name'], ENT_QUOTES, "utf-8");
        $name = htmlentities($_FILES['file']['name'], ENT_QUOTES, "utf-8");
        $size = htmlentities($_FILES['file']['size'], ENT_QUOTES, "utf-8");
        $error = htmlentities($_FILES['file']['error'], ENT_QUOTES, "utf-8");


        $description = htmlentities($_POST["description"], ENT_QUOTES, "utf-8");
        $produit = htmlentities($_POST["produit"], ENT_QUOTES, "utf-8");
        $prix = htmlentities($_POST["prix"], ENT_QUOTES, "utf-8");
        $qte = htmlentities($_POST["qte"], ENT_QUOTES, "utf-8");
        $marque = htmlentities($_POST["marque"], ENT_QUOTES, "utf-8");
        $categorie = htmlentities($_POST["idcat"], ENT_QUOTES, "utf-8");
        $image = $name;
        $messeror = "Verifier les champ ";
        if (empty($description) || empty($produit) || empty($prix) || empty($marque) || empty($categorie) || empty($image) || empty($qte)) {
            if (empty($description)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($produit)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($prix)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($marque)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($categorie)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($image)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
            if (empty($qte)) {
                echo "<script type='text/javascript'>alert('$messeror');document.location.href ='page_ajout_article.php'</script>";
            }
        } else {

            $inserer = "insert into produit (description,produit,prix,marque,image,idcat,qte) values ('$description','$produit','$prix','$marque','$image','$categorie','$qte')";
            mysqli_query($bdd, $inserer);

            move_uploaded_file($tmpName, './../../image_webshop/' . $name); //ça envoie l'image dans le dossier imagewebshop

            echo "<script type='text/javascript'>alert('Produit ajouter'); document.location.href = 'page_admin_produit.php'</script>";


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