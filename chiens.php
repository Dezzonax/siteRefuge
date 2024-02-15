<?php
session_start();

require('appelEtPost/dbconnect.php');

$chiensMales = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.file_name, animals.birthdate, animals.categorie FROM animals WHERE animals.animal_type = 'chien' AND animals.mfi = 1");

$donneesChiensMales = $chiensMales->fetchall(PDO::FETCH_ASSOC);

$chiensFemelles = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.file_name, animals.birthdate, animals.categorie FROM animals WHERE animals.animal_type = 'chien' AND animals.mfi = 2");

$donneesChiensFemelles = $chiensFemelles->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiens - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Chiens<?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo(' <a href="new-animal.php" class="btn btn-primary">Nouveau</a>');}?></h1><hr><br>

        <?php if ($donneesChiensMales || $donneesChiensFemelles) { ?>

            <?php if ($donneesChiensMales) { ?>

                <h3>Mâles :</h3>

                <div class="conteneur-de-cartes">

                    <?php foreach ($donneesChiensMales as $donneeChienMale) { ?>

                        <div class="card" style="width: 18rem;">
                            <img src="medias/images/photos_animaux/<?=$donneeChienMale['file_name']?>" class="card-img-top" alt="photo <?=$donneeChienMale['file_name']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$donneeChienMale['name']?></h5>
                                <p class="card-text">
                                    <?php 
                                    
                                    $infoschien = "";
                                    if ($donneeChienMale['animal_race']) {$infoschien = $infoschien.$donneeChienMale['animal_race']." "; };
                                    $infoschien =$infoschien.'mâle';

                                    $birthdate = new DateTime($donneeChienMale['birthdate']);

                                    date_default_timezone_set('Europe/Paris');
                                    $datetime = new DateTime();
                                    $dateDiff = $birthdate->diff($datetime);

                                    if ($dateDiff->y >= 1) {
                                        $infoschien =$infoschien.", ".$dateDiff->y." ans";
                                    } elseif ($dateDiff->y == 1) {
                                        $infoschien =$infoschien.", 1 an";
                                    } else {
                                        $infoschien =$infoschien.", ".$dateDiff->m." mois";
                                    };

                                    echo(ucfirst($infoschien));

                                    if ($donneeChienMale['categorie']) {
                                        echo('<div class="alert alert-warning" role="alert">Procédure chien catégorisé</div>');
                                    }?>

                                </p>
                            </div>
                            <a href="details-animal.php?id=<?=$donneeChienMale['id']?>" class="btn btn-light">Voir plus</a>
                        </div>

                    <?php } ?>

                </div>

            <?php } ?>

            <?php if ($donneesChiensFemelles) { ?>

                <br>

                <h3>Femelles :</h3>

                <div class="conteneur-de-cartes">

                    <?php foreach ($donneesChiensFemelles as $donneeChienFemelle) { ?>

                        <div class="card" style="width: 18rem;">
                            <img src="medias/images/photos_animaux/<?=$donneeChienFemelle['file_name']?>" class="card-img-top" alt="photo <?=$donneeChienFemelle['file_name']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$donneeChienFemelle['name']?></h5>
                                <p class="card-text">
                                    <?php 
                                    
                                    $infoschien = "";
                                    if ($donneeChienFemelle['animal_race']) {$infoschien = $infoschien.$donneeChienFemelle['animal_race']." "; };
                                    $infoschien =$infoschien.'femelle';

                                    $birthdate = new DateTime($donneeChienFemelle['birthdate']);

                                    date_default_timezone_set('Europe/Paris');
                                    $datetime = new DateTime();
                                    $dateDiff = $birthdate->diff($datetime);

                                    if ($dateDiff->y >= 1) {
                                        $infoschien =$infoschien.", ".$dateDiff->y." ans";
                                    } elseif ($dateDiff->y == 1) {
                                        $infoschien =$infoschien.", 1 an";
                                    } else {
                                        $infoschien =$infoschien.", ".$dateDiff->m." mois";
                                    };

                                    echo(ucfirst($infoschien));

                                    if ($donneeChienFemelle['categorie']) {
                                        echo('<div class="alert alert-warning" role="alert">Procédure chien catégorisé</div>');
                                    }?>
                                    
                                </p>
                            </div>
                            <a href="details-animal.php?id=<?=$donneeChienFemelle['id']?>" class="btn btn-light">Voir plus</a>
                        </div>

                    <?php } ?>

                </div>

            <?php } ?>

        <?php } else { echo("Il n'y a aucun chien disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>