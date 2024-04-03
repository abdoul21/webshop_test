<?php
include("../../bdd.php");
session_start();
if ($_SESSION['id_role'] == 1 && $_SESSION['idmembre']) {
    $idcontact = $_GET['id'];
    $result = mysqli_query($bdd, "DELETE FROM contact WHERE idcontact=$idcontact");
    header("Location:page_admin_contacte.php");
} else {
    header('Location: ../../404.html');
    die();
}