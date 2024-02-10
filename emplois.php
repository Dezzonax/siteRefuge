<?php
session_start();

require('appelEtPost/dbconnect.php');

$emplois = $bdd->query("SELECT jobs.id, jobs.titre FROM jobs WHERE jobs.type_offre = 1");

$donneesEmplois = $emplois->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres d'emploi - Refuge de Reims</title>

<?php require('commun/header.php'); ?>

<main>

    <div class="container">

    <h1>Offres d'emploi<?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo(' <a href="new-offre.php" class="btn btn-primary">Nouveau</a>');}?></h1><hr><br>

    <?php if ($donneesEmplois) { ?>

        <?php foreach ($donneesEmplois as $donneeEmploi) { ?>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$donneeEmploi['titre']?></h5>
                    <a href="details-offre.php?id=<?=$donneeEmploi['id']?>" class="card-link">Voir plus</a>
                </div>
            </div>

        <?php } ?>

        <br>

    <?php } else { echo("Il n'y a aucune offre d'emploi actuellement."); } ?>

</main>

<?php require('commun/footer.php'); ?>