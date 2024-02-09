<?php
session_start();

require('appelEtPost/dbconnect.php');

$infos = $bdd->query("SELECT * FROM jobs WHERE jobs.id = {$_GET['id']}");

$infosOffre = $infos->fetchall(PDO::FETCH_ASSOC);

    if (!$infosOffre) {
        $_SESSION["msgErreurIndex"] = "La page à laquelle vous essayez d'accéder n'existe pas ou plus.";
        header("Location: ./index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst($infosOffre[0]['titre'])?> - Refuge de Reims</title>

<?php require('commun/header.php'); ?>

<main>

    <div class="container">

    <h1><?=ucfirst($infosOffre[0]['titre'])?></h1><hr><br>

    <p><?=nl2br($infosOffre[0]['description'])?></p>

    <a href="./modif-offre.php?id=<?=$_GET['id']?>" class="btn btn-primary">Modifier</a>
    <a href="./appelEtPost/supprOffre.php?id=<?=$_GET['id']?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</a>

    <br>

    </div>

</main>

<?php require('commun/footer.php'); ?>