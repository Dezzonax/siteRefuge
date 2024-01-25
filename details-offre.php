<?php
require('appelDetails-offre.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst($infosOffre[0]['titre'])?> - Refuge de Reims</title>

<?php
require('commun/header.php');
?>

<main>

    <div class="container">

    <h1><?=ucfirst($infosOffre[0]['titre'])?></h1><hr><br>

    <p><?=nl2br($infosOffre[0]['description'])?></p>

    <br>

    </div>

</main>

<?php
require('commun/footer.php');
?>