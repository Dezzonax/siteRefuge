<?php
session_start();

if (isset($_GET["id"]) && isset($_SESSION['check']) && $_SESSION['check'] == "log") {

    require('dbconnect.php');

    $actualite = $bdd->query("SELECT actualites.image_name FROM actualites WHERE actualites.id = {$_GET["id"]}");
    $donneesActualite = $actualite->fetchall(PDO::FETCH_ASSOC);

    $stmt= "DELETE FROM actualites WHERE actualites.id = '{$_GET["id"]}'";
    $requete = $bdd->query($stmt);

    if ($donneesActualite[0]['image_name']) {
        unlink("../medias/images/photos_actus/".$donneesActualite[0]['image_name']);
    }

    header("Location: ../actualites.php");
    exit;

} else {
    header("Location: ../index.php");
    exit;
};