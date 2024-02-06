<?php
session_start();

require('bdconnect.php');

$actualite = $bdd->query("SELECT actualites.id, actualites.title, actualites.content FROM actualites WHERE actualites.id = {$_GET['id']}");

$donneesActualite = $actualite->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une actualité - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Modifier une actualité</h1><hr><br>

        <?php if (isset($_SESSION["modifActuMsg"]) && !empty($_SESSION["modifActuMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["modifActuMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postModif-actualite.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'actualité</label>
                    <input type="text" name="article_title" id="title" class="form-control" value="<?=$donneesActualite[0]['title']?>" required>
                </div>
                
                <br>

                <div class="mb-3">
                    <textarea name="article_content" id="article_content" class="form-control" rows="5" required><?=$donneesActualite[0]['content']?></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="<?=$donneesActualite[0]['id']?>">

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["modifActuMsg"])) { unset($_SESSION["modifActuMsg"]); };
require('commun/footer.php');
?>