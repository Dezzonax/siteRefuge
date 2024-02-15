<?php
session_start();

require('appelEtPost/dbconnect.php');

$chatsMales = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.file_name, animals.birthdate FROM animals WHERE animals.animal_type = 'chat' AND animals.mfi = 1");

$donneesChatsMales = $chatsMales->fetchall(PDO::FETCH_ASSOC);

$chatsFemelles = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.file_name, animals.birthdate FROM animals WHERE animals.animal_type = 'chat' AND animals.mfi = 2");

$donneesChatsFemelles = $chatsFemelles->fetchall(PDO::FETCH_ASSOC);
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

        <?php if ($donneesChatsMales || $donneesChatsFemelles) { ?>

            <?php if ($donneesChatsMales) { ?>

                <h3>Mâles :</h3>

                <div class="conteneur-de-cartes">

                    <?php foreach ($donneesChatsMales as $donneeChatMale) { ?>

                        <div class="card" style="width: 18rem;">
                            <img src="medias/images/photos_animaux/<?=$donneeChatMale['file_name']?>" class="card-img-top" alt="photo <?=$donneeChatMale['file_name']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$donneeChatMale['name']?></h5>
                                <p class="card-text">
                                    <?php 
                                    
                                    $infoschat = "";
                                    if ($donneeChatMale['animal_race']) {$infoschat = $infoschat.$donneeChatMale['animal_race']." "; };
                                    $infoschat =$infoschat.'mâle';

                                    $birthdate = new DateTime($donneeChatMale['birthdate']);

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

                                    echo(ucfirst($infoschat));?>
                                    
                                </p>
                            </div>
                            <a href="details-animal.php?id=<?=$donneeChatMale['id']?>" class="btn btn-light">Voir plus</a>
                        </div>

                    <?php } ?>

                </div>

            <?php } ?>

            <?php if ($donneesChatsFemelles) { ?>

                <h3>Femelles :</h3>

                <div class="conteneur-de-cartes">

                    <?php foreach ($donneesChatsFemelles as $donneeChatFemelle) { ?>

                        <div class="card" style="width: 18rem;">
                            <img src="medias/images/photos_animaux/<?=$donneeChatFemelle['file_name']?>" class="card-img-top" alt="photo <?=$donneeChatFemelle['file_name']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$donneeChatFemelle['name']?></h5>
                                <p class="card-text">
                                    <?php 
                                    
                                    $infoschat = "";
                                    if ($donneeChatFemelle['animal_race']) {$infoschat = $infoschat.$donneeChatFemelle['animal_race']." "; };
                                    $infoschat =$infoschat.'femelle';

                                    $birthdate = new DateTime($donneeChatFemelle['birthdate']);

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

                                echo(ucfirst($infoschat));?>

                                </p>
                            </div>
                            <a href="details-animal.php?id=<?=$donneeChatFemelle['id']?>" class="btn btn-light">Voir plus</a>
                        </div>

                    <?php } ?>

                </div>

                <?php } ?>

        <?php } else { echo("Il n'y a aucun chat disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>