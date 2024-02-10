<?php
session_start();

require('appelEtPost/dbconnect.php');

$chats = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.mfi, animals.file_name, animals.birthdate, animals.adoption_sos FROM animals WHERE animals.animal_type = 'chat'");

$donneesChats = $chats->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Chats<?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo(' <a href="new-animal.php" class="btn btn-primary">Nouveau</a>');}?></h1><hr><br>

        <?php if ($donneesChats) { ?>

            <div class="conteneur-de-cartes">

                <?php foreach ($donneesChats as $donneeChat) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="medias/images/photos_animaux/<?=$donneeChat['file_name']?>" class="card-img-top" alt="photo <?=$donneeChat['file_name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$donneeChat['name']?></h5>
                            <p class="card-text">
                                <?php 
                                
                                $infoschat = "";
                                if ($donneeChat['animal_race']) {$infoschat = $infoschat.$donneeChat['animal_race']." "; };
                                if ($donneeChat['mfi'] == 1) {$infoschat =$infoschat.'mâle';} elseif ($donneeChat['mfi'] == 2) {$infoschat =$infoschat.'femelle';};

                                $birthdate = new DateTime($donneeChat['birthdate']);

                                date_default_timezone_set('Europe/Paris');
                                $datetime = new DateTime();
                                $dateDiff = $birthdate->diff($datetime);

                                if ($dateDiff->y >= 1) {
                                    $infoschat =$infoschat.", ".$dateDiff->y." ans";
                                } elseif ($dateDiff->y == 1) {
                                    $infoschat =$infoschat.", 1 an";
                                } else {
                                    $infoschat =$infoschat.", ".$dateDiff->m." mois";
                                };

                                echo(ucfirst($infoschat));

                                if ($donneeChat['adoption_sos']) {
                                    echo('<div class="alert alert-info" role="alert">Adoption SOS !</div>');
                                }
                                
                                ?>
                            </p>
                        </div>
                        <a href="details-animal.php?id=<?=$donneeChat['id']?>" class="btn btn-light">Voir plus</a>
                    </div>

                <?php } ?>

            </div>

        <?php } else { echo("Il n'y a aucun chat disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>