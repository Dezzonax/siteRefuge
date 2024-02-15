<?php
session_start();

require('appelEtPost/dbconnect.php');

$autres = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.mfi, animals.file_name, animals.birthdate FROM animals WHERE animals.animal_type != 'chien' AND animals.animal_type != 'chat'");

$donneesAutres = $autres->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autres animaux de compagnie - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Autres animaux de compagnie<?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo(' <a href="new-animal.php" class="btn btn-primary">Nouveau</a>');}?></h1><hr><br>

        <?php if ($donneesAutres) { ?>

            <div class="conteneur-de-cartes">

                <?php foreach ($donneesAutres as $donneeAutre) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="medias/images/photos_animaux/<?=$donneeAutre['file_name']?>" class="card-img-top" alt="photo <?=$donneeAutre['file_name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$donneeAutre['name']?></h5>
                            <p class="card-text">
                                <?php 
                                
                                $infosautre = "";
                                if ($donneeAutre['animal_race']) {$infosautre = $infosautre.$donneeAutre['animal_race']." "; };
                                if ($donneeAutre['mfi'] == 1) {$infosautre =$infosautre.'mâle';} elseif ($donneeAutre['mfi'] == 2) {$infosautre =$infosautre.'femelle';};

                                $birthdate = new DateTime($donneeAutre['birthdate']);

                                date_default_timezone_set('Europe/Paris');
                                $datetime = new DateTime();
                                $dateDiff = $birthdate->diff($datetime);

                                if ($dateDiff->y >= 1) {
                                    $infosautre =$infosautre.", ".$dateDiff->y." ans";
                                } elseif ($dateDiff->y == 1) {
                                    $infosautre =$infosautre.", 1 an";
                                } else {
                                    $infosautre =$infosautre.", ".$dateDiff->m." mois";
                                };

                                echo(ucfirst($infosautre));?>
                                
                            </p>
                        </div>
                        <a href="details-animal.php?id=<?=$donneeAutre['id']?>" class="btn btn-light">Voir plus</a>
                    </div>

                <?php } ?>

            </div>

        <?php } else { echo("Il n'y a aucun autre animal de compagnie disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>