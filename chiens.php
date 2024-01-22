<?php
    require('appelChiens.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiens - Refuge de Reims</title>

<?php
require('commun/header.php');
?>
    
    <main>

        <div class="container">

            <div class="conteneur-de-cartes">

                <?php foreach ($donneesChiens as $donneeChien) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="./medias/images/photos_animaux/<?=$donneeChien['file_name']?>" class="card-img-top" alt="photo <?=$donneeChien['file_name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$donneeChien['name']?></h5>
                            <p class="card-text">
                                <?php 
                                
                                $infoschien = "";
                                if ($donneeChien['animal_race']) {$infoschien = $infoschien.$donneeChien['animal_race']." "; };
                                if ($donneeChien['mfi'] == 1) {$infoschien =$infoschien.'mâle';} elseif ($donneeChien['mfi'] == 2) {$infoschien =$infoschien.'femelle';};

                                $birthdate = new DateTime($donneeChien['birthdate']);

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

                                if ($donneeChien['adoption_sos']) {
                                    echo('<div class="alert alert-info" role="alert">Adoption SOS !</div>');
                                }
                                
                                ?>
                            </p>
                        </div>
                        <a href="./details-animal.php?id=<?=$donneeChien['id']?>" class="btn btn-light">Voir plus</a>
                    </div>

                <?php } ?>

            </div>

        </div>

    </main>

<?php
require('commun/footer.php');
?>