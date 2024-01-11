<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de nouvelles offres d'emplois ou bénévolat - Refuge de Reims</title>

<?php 
session_start();
require('commun/header.php');
?>
    
    <main>

        <div class="container">

        <?php if (isset($_SESSION["newJobMsg"]) && !empty($_SESSION["newJobMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["newJobMsg"]?>
        </div>

        <?php }; ?>

            <form action="postNew-job.php" method="post">

                <div class="mb-3">
                    <label for="job_title" class="form-label">Titre de l'offre</label>
                    <input type="text" name="job_title" id="job_title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="job_description">Description de l'offre</label>
                    <textarea class="form-control" name="job_description" id="job_description" rows="3" required></textarea>
                </div>

                <br>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="job_type" id="flexRadioDefault1" value="1" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Offre d'emploi
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="job_type" id="flexRadioDefault1" value="2" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Offre de bénévolat
                </label>
                </div>

                <br>

                <input type="submit" name="submit" class="btn btn-primary">

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["newJobMsg"])) { unset($_SESSION["newJobMsg"]); };
require('commun/footer.php');
?>