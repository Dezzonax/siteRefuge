<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Refuge de Reims</title>

<?php require('commun/header.php') ?>
    
    <main>

        <div class="container">

        <?php if (isset($_SESSION["msgIndex"]) && !empty($_SESSION["msgIndex"])) { ?>

            <div class="alert alert-warning" role="alert"><?=$_SESSION["msgIndex"]?></div>

        <?php } ?>

            <?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") echo('connecté');?>

        </div>

    </main>

<?php 
require('commun/footer.php');
if (isset($_SESSION["msgIndex"])) { unset($_SESSION["msgIndex"]); }
if (isset($_SESSION["msgConnexion"])) { unset($_SESSION["msgConnexion"]); }
?>