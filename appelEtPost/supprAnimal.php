<?php
session_start();

if (isset($_GET["id"]) && isset($_SESSION['check']) && $_SESSION['check'] == "log") {

    require('dbconnect.php');

    $offre = $bdd->query("SELECT animals.animal_type, animals.file_name FROM animals WHERE animals.id = {$_GET["id"]}");
    $donneesAnimal = $offre->fetchall(PDO::FETCH_ASSOC);

    $stmt= "DELETE FROM animals WHERE animals.id = '{$_GET["id"]}'";
    $requete = $bdd->query($stmt);

    unlink("../medias/images/photos_animaux/".$donneesAnimal[0]['file_name']);

    if ($donneesAnimal[0]['animal_type'] == 'chien') {
        header("Location: ../chiens.php");
        exit;
    } elseif ($donneesAnimal[0]['animal_type'] == 'chat') {
        header("Location: ../chats.php");
        exit;
    } else {
        header("Location: ../autres.php");
        exit;
    }

} else {
    header("Location: ../index.php");
    exit;
};