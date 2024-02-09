<?php
session_start();

if (isset($_GET["id"])) {

    require('dbconnect.php');

    $offre = $bdd->query("SELECT jobs.type_offre FROM jobs WHERE jobs.id = {$_GET["id"]}");
    $donneesOffre = $offre->fetchall(PDO::FETCH_ASSOC);

    $stmt= "DELETE FROM jobs WHERE jobs.id = '{$_GET["id"]}'";
    $requete = $bdd->query($stmt);

    if ($donneesOffre[0]['type_offre'] == 1) {
        header("Location: ../emplois.php");
        exit;
    } else {
        header("Location: ../benevolat.php");
        exit;
    };

} else {
    header("Location: ../index.php");
    exit;
};