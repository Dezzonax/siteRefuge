<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Refuge de Reims</title>

<?php require('commun/header.php') ?>
    
    <main>

        <div class="container">

            <h1>Connexion</h1><hr><br>

            <?php if (isset($_SESSION["msgConnexion"]) && !empty($_SESSION["msgConnexion"])) { ?>

                <div class="alert alert-warning" role="alert"><?=$_SESSION["msgConnexion"]?></div>

            <?php } ?>

            <form action="appelEtPost/postConnexion.php" method="post">

                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <input type="submit" name="submit" class="btn btn-primary">

            </form>

        </div>

    </main>

<?php 
require('commun/footer.php');
if (isset($_SESSION["msgConnexion"])) { unset($_SESSION["msgConnexion"]); }
?>