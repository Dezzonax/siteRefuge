<?php
    require('appelActualites.php');
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

            <?php foreach ($donneesActualites as $donneesActualite) { ?>

                <article class="actualite">

                    <h2><?=$donneesActualite['title']?></h2>
                    <?php if ($donneesActualite['image_name']) {?>
                        <img src="medias/images/photos_actus/<?=$donneesActualite['image_name']?>" alt="<?=$donneesActualite['title']?>">
                    <?php } ?>
                    <p><?=$donneesActualite['content']?></p>
                
                </article>

            <?php }; ?>

        </div>

    </main>

<?php
require('commun/footer.php');
?>