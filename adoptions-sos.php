<?php
session_start();

require('appelEtPost/dbconnect.php');

$sos = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.mfi, animals.file_name, animals.birthdate, animals.adoption_sos FROM animals WHERE animals.adoption_sos = 1 ");

$donneesSOS = $sos->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptions SOS - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Adoptions SOS<?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo(' <a href="new-animal.php" class="btn btn-primary">Nouveau</a>');}?></h1><hr><br>

        <?php if ($donneesSOS) { ?>

            <div class="conteneur-de-cartes">

                <?php foreach ($donneesSOS as $donneeSOS) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="medias/images/photos_animaux/<?=$donneeSOS['file_name']?>" class="card-img-top" alt="photo <?=$donneeSOS['file_name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$donneeSOS['name']?></h5>
                            <p class="card-text">
                                <?php 
                                
                                $infosSOS = "";
                                if ($donneeSOS['animal_race']) {$infosSOS = $infosSOS.$donneeSOS['animal_race']." "; };
                                if ($donneeSOS['mfi'] == 1) {$infosSOS =$infosSOS.'mâle';} elseif ($donneeSOS['mfi'] == 2) {$infosSOS =$infosSOS.'femelle';};

                                $birthdate = new DateTime($donneeSOS['birthdate']);

                                date_default_timezone_set('Europe/Paris');
                                $datetime = new DateTime();
                                $dateDiff = $birthdate->diff($datetime);

                                if ($dateDiff->y >= 1) {
                                    $infosSOS =$infosSOS.", ".$dateDiff->y." ans";
                                } elseif ($dateDiff->y == 1) {
                                    $infosSOS =$infosSOS.", 1 an";
                                } else {
                                    $infosSOS =$infosSOS.", ".$dateDiff->m." mois";
                                };

                                echo(ucfirst($infosSOS));

                                if ($donneeSOS['adoption_sos']) {
                                    echo('<div class="alert alert-info" role="alert">Adoption SOS !</div>');
                                }
                                
                                ?>
                            </p>
                        </div>
                        <a href="details-animal.php?id=<?=$donneeSOS['id']?>" class="btn btn-light">Voir plus</a>
                    </div>

                <?php } ?>

            </div>

        <?php } else { echo("Il n'y a aucun chat disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>