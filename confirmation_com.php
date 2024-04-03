<?php
include("bdd.php");
session_start();
if ($_SESSION['id_role'] == 2) {
    $image = htmlentities($_POST['image'], ENT_QUOTES, 'UTF-8');
    $produit = htmlentities($_POST["produit"], ENT_QUOTES, 'UTF-8');
    $prix = htmlentities($_POST["prix"], ENT_QUOTES, 'UTF-8');
    $quantiter = $qty <= 0 ? 1 :$qty;
    $prenom = htmlentities($_SESSION['prenom'], ENT_QUOTES, 'UTF-8');
    $statue = "non-livrer";
    $total = ($quantiter * $prix);

    try {
        //SELECTIONNER L'ID RESERVATION DE LA TABLE RESERVATION
        $stmt = $conn->prepare("SELECT idreserv FROM reservation ORDER BY idreserv DESC LIMIT 1");
        $stmt->execute();
        $resultat = $stmt->fetch();
        $num = $resultat['idreserv'];
        //SELECTIONNER LA QUANTITE DE LA TABLE PRODUIT DE LA TABLE PRODUIT
        //a faire une verification que la quantité ne soi pas <0 inferieur
        $stm = $conn->prepare("SELECT idproduit, qte FROM produit where produit='" . $produit . "' ");
        $stm->execute();
        $res = $stm->fetch();
        $id_p = $res['idproduit'];
        $pqte = $res['qte'];
        $quantiter_totale = ($pqte - $quantiter);

        if (empty($num)) {
            $num = 0;
        }
        $num++; // DERNIER ID + 1 sur le numéro de commande
        $sql = "INSERT INTO reservation(idreserv, NC, Nomclient, Produit, Date, qte, prix, statue, image)
    VALUES (null, '$num', '$prenom', '$produit', CURDATE(),'$quantiter','$total','$statue','$image')";
        // use exec() because no results are returned
        $conn->exec($sql);

        $mja = "UPDATE produit SET  qte='" . $quantiter_totale . "' WHERE produit='" . $produit . "'";

        mysqli_query($bdd, $mja);

        mysqli_close($bdd);

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    echo "<script type='text/javascript'>alert('votre réservation a été confirmé'); document.location.href = 'produit.php'</script>";

} else {
    echo "<script type='text/javascript'>alert('veuillez-vous connecter ou vous inscrire'); document.location.href = 'connexion/login.html'</script>";

}
?>