<?php


function checkPassword($motDePasse)
{
    // Longueur minimale : 12 caractères
    if (strlen($motDePasse) < 8) {
        return false;
    }

    // Complexité : Mélange de majuscules, minuscules, chiffres et caractères spéciaux
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/', $motDePasse)) {
        return false;
    }

    // Modification régulière : Tous les 180 jours (en secondes)
    $derniereModification = strtotime("dernière modification du mot de passe");
    $tempsActuel = time();
    $delaiModification = 180 * 24 * 60 * 60; // 180 jours en secondes

    if (($tempsActuel - $derniereModification) > $delaiModification) {
        return false;
    }

    return true;
}





?>