<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Refuge de Reims</title>

<?php require('commun/header.php') ?>
    
    <main>

        <div class="container">

        <?php if (isset($_SESSION["msgErreurIndex"])) { ?>

            <div class="alert alert-warning" role="alert"><?=$_SESSION["msgErreurIndex"]?></div>

        <?php } ?>



        </div>

    </main>

<?php 
require('commun/footer.php');
if (isset($_SESSION["msgErreurIndex"])) { unset($_SESSION["msgErreurIndex"]); }
?>