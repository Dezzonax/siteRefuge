<?php
require('appelEtPost/appelAdoptes.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les adoptés - Refuge de Reims</title>

<?php
require('commun/header.php');
?>
    
    <main>

        <div class="container">

        <h1>Les adoptés</h1><hr><br>

        <?php if ($donneesAdoptes) { ?>

            <div class="conteneur-de-cartes">

                <?php foreach ($donneesAdoptes as $donneeAdopte) { ?>

                    <div class="card" style="width: 25rem;">
                        <img src="./medias/images/photos_adoptes/<?=$donneeAdopte['file_name']?>" class="card-img-top" alt="photo <?=$donneeAdopte['file_name']?>">
                        <div class="card-body">
                            <p class="card-text">
                                <?=nl2br($donneeAdopte['description'])?>
                            </p>
                        </div>
                    </div>

                <?php } ?>

            </div>

        <?php } else { echo("Il n'y a aucun autre animal de compagnie disponible à l'adoption actuellement."); } ?>

        </div>

    </main>

<?php
require('commun/footer.php');
?>