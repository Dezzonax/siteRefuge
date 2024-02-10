<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de nouveaux adoptés - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Ajout d'un nouvel adopté</h1><hr><br>

        <?php if (isset($_SESSION["newAdopteMsg"]) && !empty($_SESSION["newAdopteMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["newAdopteMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postNew-adopte.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter une image :</label>
                    <input class="form-control" type="file" id="formFile" name="adopte_picture" value="Upload" accept=".png, .jpeg, .jpg, .jfif" required>
                </div>

                <br>
                
                <div class="mb-3">
                    <textarea name="adopte_description" id="adopte_description" class="form-control" rows="5" required></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-primary">

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["newAdopteMsg"])) { unset($_SESSION["newAdopteMsg"]); };
require('commun/footer.php');
?>