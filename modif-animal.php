<?php
session_start();

require('appelEtPost/dbconnect.php');

$animal = $bdd->query("SELECT * FROM animals WHERE animals.id = {$_GET['id']}");

$donneesAnimal = $animal->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les informations d'un animal - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Modifier les informations d'un animal</h1><hr><br>

        <?php if (isset($_SESSION["modifAnimalMsg"]) && !empty($_SESSION["modifAnimalMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["modifAnimalMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postModif-animal.php" method="post">

                <div class="mb-3">
                    <label for="animal_name" class="form-label">Nom de l'animal* :</label>
                    <input type="text" name="animal_name" id="animal_name" class="form-control" value="<?=$donneesAnimal[0]["name"]?>" required>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="chien" <?php if ($donneesAnimal[0]["animal_type"] == 'chien') {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Chien
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="chat" <?php if ($donneesAnimal[0]["animal_type"] == 'chat') {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Chat
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="autre" <?php if ($donneesAnimal[0]["animal_type"] == 'autre') {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Autre
                </label>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_race" class="form-label">Race de l'animal :</label>
                    <input type="text" name="animal_race" id="animal_race" class="form-control" <?php if ($donneesAnimal[0]["animal_race"]) {echo('value="'.$donneesAnimal[0]["animal_race"].'"');} ?>>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="1" <?php if ($donneesAnimal[0]["mfi"] == 1) {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Mâle
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="2" <?php if ($donneesAnimal[0]["mfi"] == 2) {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Femelle
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="3" <?php if ($donneesAnimal[0]["mfi"] == 3) {echo('checked');} ?> required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Inconnu
                </label>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_birthdate" class="form-label">Date de naissance de l'animal :</label>
                    <input type="date" name="animal_birthdate" id="animal_birthdate" class="form-control" <?php if ($donneesAnimal[0]["birthdate"]) {echo('value="'.$donneesAnimal[0]["birthdate"].'"');} ?>>
                </div>

                <div class="form-group">
                    <label for="animal_description">Description de l'animal* :</label>
                    <textarea class="form-control" name="animal_description" id="animal_description" rows="5" required><?= $donneesAnimal[0]["description"] ?></textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_maison" class="form-label">Maison :</label>
                    <input type="text" name="animal_maison" id="animal_maison" class="form-control" <?php if ($donneesAnimal[0]["maison"]) {echo('value="'.$donneesAnimal[0]["maison"].'"');} ?>>
                </div>

                <div class="mb-3">
                    <label for="animal_appartement" class="form-label">Appartement :</label>
                    <input type="text" name="animal_appartement" id="animal_appartement" class="form-control" <?php if ($donneesAnimal[0]["appartement"]) {echo('value="'.$donneesAnimal[0]["appartement"].'"');} ?>>
                </div>

                <div class="mb-3">
                    <label for="animal_enfants" class="form-label">Jeunes enfants :</label>
                    <input type="text" name="animal_enfants" id="animal_enfants" class="form-control" <?php if ($donneesAnimal[0]["enfants"]) {echo('value="'.$donneesAnimal[0]["enfants"].'"');} ?>>
                </div>

                <div class="mb-3">
                    <label for="animal_chiens" class="form-label">Chiens :</label>
                    <input type="text" name="animal_chiens" id="animal_chiens" class="form-control" <?php if ($donneesAnimal[0]["chiens"]) {echo('value="'.$donneesAnimal[0]["chiens"].'"');} ?>>
                </div>

                <div class="mb-3">
                    <label for="animal_chats" class="form-label">Chats :</label>
                    <input type="text" name="animal_chats" id="animal_chats" class="form-control" <?php if ($donneesAnimal[0]["chats"]) {echo('value="'.$donneesAnimal[0]["chats"].'"');} ?>>
                </div>

                <div class="mb-3">
                    <label for="animal_categorie" class="form-label">Catégorie :</label>
                    <input type="text" name="animal_categorie" id="animal_categorie" class="form-control"  <?php if ($donneesAnimal[0]["categorie"]) {echo('value="'.$donneesAnimal[0]["categorie"].'"');} ?>>
                </div>

                <br>

                <button type="submit" name="submit" class="btn btn-primary" value="<?=$donneesAnimal[0]['id']?>">Modifier les informations</button>

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["modifAnimalMsg"])) { unset($_SESSION["modifAnimalMsg"]); };
require('commun/footer.php');
?>