<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de nouveaux animaux - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Ajout d'un nouvel animal</h1><hr><br>

        <?php if (isset($_SESSION["newAnimalMsg"]) && !empty($_SESSION["newAnimalMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["newAnimalMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postNew-animal.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="animal_name" class="form-label">Nom de l'animal :*</label>
                    <input type="text" name="animal_name" id="animal_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="animalFile" class="form-label">Photo de l'animal :*</label>
                    <input class="form-control" type="file" id="animalFile" name="animal_picture" value="Upload" accept=".png, .jpeg, .jpg, .jfif" required>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="chien" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Chien
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="chat" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Chat
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_type" id="flexRadioDefault1" value="autre" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Autre
                </label>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_race" class="form-label">Race de l'animal :</label>
                    <input type="text" name="animal_race" id="animal_race" class="form-control">
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="1" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Mâle
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="2" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Femelle
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="animal_mfi" id="flexRadioDefault1" value="3" required>
                <label class="form-check-label" for="flexRadioDefault1">
                    Inconnu
                </label>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_birthdate" class="form-label">Date de naissance de l'animal :</label>
                    <input type="date" name="animal_birthdate" id="animal_birthdate" class="form-control">
                </div>

                <div class="form-group">
                    <label for="animal_description">Description de l'animal :*</label>
                    <textarea class="form-control" name="animal_description" id="animal_description" rows="5" required></textarea>
                </div>

                <br>

                <div class="mb-3">
                    <label for="animal_maison" class="form-label">Maison :</label>
                    <input type="text" name="animal_maison" id="animal_maison" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="animal_appartement" class="form-label">Appartement :</label>
                    <input type="text" name="animal_appartement" id="animal_appartement" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="animal_enfants" class="form-label">Jeunes enfants :</label>
                    <input type="text" name="animal_enfants" id="animal_enfants" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="animal_chiens" class="form-label">Chiens :</label>
                    <input type="text" name="animal_chiens" id="animal_chiens" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="animal_chats" class="form-label">Chats :</label>
                    <input type="text" name="animal_chats" id="animal_chats" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="animal_categorie" class="form-label">Catégorie :</label>
                    <input type="text" name="animal_categorie" id="animal_categorie" class="form-control">
                </div>

                <input class="form-check-input" type="checkbox" name="animal_sos" id="flexCheckDefault" value="1">
                <label class="form-check-label" for="flexCheckDefault">
                    Adoption SOS
                </label>

                <br><br>

                <input type="submit" name="submit" class="btn btn-primary">

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["newAnimalMsg"])) { unset($_SESSION["newAnimalMsg"]); };
require('commun/footer.php');
?>