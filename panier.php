<?php
session_start();
include_once "bdd.php";

//supprimer les produits
//si la variable del existe
if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
}
?>
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <table>
                    <tr>
                        <th>...</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    $total = 0 ;
                    // liste des produits
                    //récupérer les clés du tableau session
                    $ids = array_keys($_SESSION['panier']);
                    //s'il n'y a aucune clé dans le tableau
                    if(empty($ids)){
                        echo "Votre panier est vide";
                    }else {
                        //si oui
                        $products = mysqli_query($bdd, "SELECT * FROM produit WHERE idproduit IN (".implode(',', $ids).")");

                        //lise des produit avec une boucle foreach
                        foreach($products as $product):
                            //calculer le total ( prix unitaire * quantité)
                            //et aditionner chaque résutats a chaque tour de boucle
                            $total = $total + $product['prix'] * $_SESSION['panier'][$product['idproduit']] ;
                            ?>
                            <tr>
                                <td><img style="width:40px; padding: 8px 0" src="image_webshop/<?=$product['image']?>"></td>
                                <td><?=$product['produit']?></td>
                                <td><?=$product['prix']?>€</td>
                                <td><?=$_SESSION['panier'][$product['idproduit']] // Quantité?></td>
                                <td><a href="panier.php?del=<?=$product['idproduit']?>"><img src="delete.png"></a></td>
                            </tr>

                        <?php endforeach ;} ?>

                    <tr class="total">
                        <th>Total : <?=$total?>€</th>
                    </tr>
                </table>
            </section>
            <div class="modal-footer">
                <a type="button" href="produit.php"  data-dismiss="modal"><button class="btn btn-secondary">Close</button> </a>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>