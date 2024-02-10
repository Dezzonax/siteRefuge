<?php
session_start();

if (isset($_GET["id"]) && isset($_SESSION['check']) && $_SESSION['check'] == "log") {

    require('dbconnect.php');

    $adopte = $bdd->query("SELECT adoptes.file_name FROM adoptes WHERE adoptes.id = {$_GET["id"]}");
    $donneesAdopte = $adopte->fetchall(PDO::FETCH_ASSOC);

    $stmt= "DELETE FROM adoptes WHERE adoptes.id = '{$_GET["id"]}'";
    $requete = $bdd->query($stmt);


    unlink("../medias/images/photos_adoptes/".$donneesAdopte[0]['file_name']);


    header("Location: ../adoptes.php");
    exit;

} else {
    header("Location: ../index.php");
    exit;
};