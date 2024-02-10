<?php
session_start();

require('appelEtPost/dbconnect.php');

$offre = $bdd->query("SELECT jobs.id, jobs.titre, jobs.description FROM jobs WHERE jobs.id = {$_GET['id']}");

$donneesOffre = $offre->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une offre d'emploi ou de bénévolat - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Modifier une offre d'emploi ou de bénévolat</h1><hr><br>

        <?php if (isset($_SESSION["modifOffreMsg"]) && !empty($_SESSION["modifOffreMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["modifOffreMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postModif-offre.php" method="post">

                <div class="mb-3">
                    <label for="job_title" class="form-label">Titre de l'offre :</label>
                    <input type="text" name="job_title" id="job_title" class="form-control" value="<?=$donneesOffre[0]['titre']?>" required>
                </div>

                <div class="form-group">
                    <label for="job_description">Description de l'offre :</label>
                    <textarea class="form-control" name="job_description" id="job_description" rows="5" required><?=$donneesOffre[0]['description']?></textarea>
                </div>

                <br>

                <button type="submit" name="submit" class="btn btn-primary" value="<?=$donneesOffre[0]['id']?>">Modifier l'offre</button>

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["modifOffreMsg"])) { unset($_SESSION["modifOffreMsg"]); };
require('commun/footer.php');
?>