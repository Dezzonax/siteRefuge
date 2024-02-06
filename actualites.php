<?php
session_start();

require('appelEtPost/dbconnect.php');

$actualites = $bdd->query("SELECT actualites.id, actualites.title, actualites.image_name, actualites.content, actualites.creation_date, actualites.edit_date FROM actualites");

$donneesActualites = $actualites->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

            <h1>Actualités</h1><hr>

            <?php foreach ($donneesActualites as $donneesActualite) { ?>

                <br>

                <?php if ($donneesActualite['image_name']) {?>

                    <article class="actualite">

                            <img src="medias/images/photos_actus/<?=$donneesActualite['image_name']?>" alt="<?=$donneesActualite['title']?>" class="actualite-image">
                        
                        <div class="actualite-text">
                            <h3><?=$donneesActualite['title']?></h3>
                            <p class="actualite-date"><?=$donneesActualite['creation_date']?> - <?=$donneesActualite['edit_date']?></p>
                            <p><?=nl2br($donneesActualite['content'])?></p>

                            <a href="./modif-actualite.php?id=<?=$donneesActualite['id']?>" class="btn btn-primary">Modifier</a>

                        </div>
                    
                    </article>

                <?php } else { ?>

                    <article class="actualite-sans-image">

                        <div class="actualite-text">
                            <h3><?=$donneesActualite['title']?></h3>
                            <p class="actualite-date"><?=$donneesActualite['creation_date']?></p>
                            <p><?=nl2br($donneesActualite['content'])?></p>

                            <a href="./modif-actualite.php?id=<?=$donneesActualite['id']?>" class="btn btn-primary">Modifier</a>

                        </div>

                    </article>

                <?php } ?>

                <br>

            <?php }; ?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>