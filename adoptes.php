<?php
session_start();

require('appelEtPost/dbconnect.php');

$adoptes = $bdd->query("SELECT * FROM adoptes");

$donneesAdoptes = $adoptes->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les adoptés - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
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

                            <a href="./modif-adopte.php?id=<?=$donneeAdopte['id']?>" class="btn btn-primary">Modifier</a>

                        </div>
                    </div>

                <?php } ?>

            </div>

        <?php } else { echo("Il n'y a rien ici pour le moment."); } ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>