<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editeur d'actualités - Refuge de Reims</title>

<?php 
session_start();
require('commun/header.php');
?>
    
    <main>

        <div class="container">

        <h1>Ajout d'une nouvelle actualité</h1><hr><br>

        <?php if (isset($_SESSION["newActuMsg"]) && !empty($_SESSION["newActuMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["newActuMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postNew-actualite.php" method="appelEtPost/post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'actualité</label>
                    <input type="text" name="article_title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter une image</label>
                    <input class="form-control" type="file" id="formFile" name="article_picture" value="Upload" accept=".png, .jpeg, .jpg, .jfif">
                </div>

                <br>
                
                <div class="mb-3">
                    <textarea name="article_content" id="article_content" class="form-control" rows="3" required></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-primary">

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["newActuMsg"])) { unset($_SESSION["newActuMsg"]); };
require('commun/footer.php');
?>