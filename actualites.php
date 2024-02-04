<?php
    require('appelEtPost/appelActualites.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités - Refuge de Reims</title>

<?php
require('commun/header.php');
?>
    
    <main>

        <div class="container">

            <h1>Actualités</h1><hr>

            <?php foreach ($donneesActualites as $donneesActualite) { ?>

                <br>
                <article class="actualite">

                    <?php if ($donneesActualite['image_name']) {?>
                        <img src="medias/images/photos_actus/<?=$donneesActualite['image_name']?>" alt="<?=$donneesActualite['title']?>" class="actualite-image">
                    <?php } ?>
                    <div class="actualite-text">
                        <h3><?=$donneesActualite['title']?></h3>
                        <p class="actualite-date"><?=$donneesActualite['creation_date']?></p>
                        <p><?=nl2br($donneesActualite['content'])?></p>
                    </div>
                
                </article>
                <br>

            <?php }; ?>

        </div>

    </main>

<?php
require('commun/footer.php');
?>