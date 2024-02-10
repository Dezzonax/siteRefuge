<?php
session_start();

require('appelEtPost/dbconnect.php');

$infos = $bdd->query("SELECT * FROM animals WHERE animals.id = {$_GET['id']}");

$infosAnimal = $infos->fetchall(PDO::FETCH_ASSOC);

    if (!$infosAnimal) {
        $_SESSION["msgIndex"] = "La page à laquelle vous essayez d'accéder n'existe pas ou plus.";
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst($infosAnimal[0]['name'])?> - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1><?=ucfirst($infosAnimal[0]['name'])?></h1><hr><br>

            <div class="infosAnimal">

                <div class="infosNotes">

                    <img src="medias/images/photos_animaux/<?=$infosAnimal[0]['file_name']?>" alt="photo de <?=ucfirst($infosAnimal[0]['name'])?>" class="image-detail-animal">

                    <p class="notes-detail-animal">

                        <?php
                        $infosAnimalTexte = "";
                        if ($infosAnimal[0]['animal_race']) {$infosAnimalTexte = $infosAnimalTexte.$infosAnimal[0]['animal_race']." "; };
                        if ($infosAnimal[0]['mfi'] == 1) {$infosAnimalTexte =$infosAnimalTexte.'mâle';} elseif ($infosAnimal[0]['mfi'] == 2) {$infosAnimalTexte =$infosAnimalTexte.'femelle';};

                        $birthdate = new DateTime($infosAnimal[0]['birthdate']);

                        date_default_timezone_set('Europe/Paris');
                        $datetime = new DateTime();
                        $dateDiff = $birthdate->diff($datetime);

                        if ($dateDiff->y >= 1) {
                            $infosAnimalTexte =$infosAnimalTexte.", ".$dateDiff->y." ans";
                        } elseif ($dateDiff->y == 1) {
                            $infosAnimalTexte =$infosAnimalTexte.", 1 an";
                        } else {
                            $infosAnimalTexte =$infosAnimalTexte.", ".$dateDiff->m." mois";
                        };

                        echo(ucfirst($infosAnimalTexte));

                        if (isset($infosAnimal[0]['maison'])) {
                            echo("<br><br>Maison: ".$infosAnimal[0]['maison']);
                        };

                        if (isset($infosAnimal[0]['appartement'])) {
                            echo("<br><br>Appartement: ".$infosAnimal[0]['appartement']);
                        };

                        if (isset($infosAnimal[0]['enfants'])) {
                            echo("<br><br>Enfants: ".$infosAnimal[0]['enfants']);
                        };

                        if (isset($infosAnimal[0]['chiens'])) {
                            echo("<br><br>Chiens: ".$infosAnimal[0]['chiens']);
                        };

                        if (isset($infosAnimal[0]['chats'])) {
                            echo("<br><br>Chats: ".$infosAnimal[0]['chats']);
                        };

                        if (isset($infosAnimal[0]['categorie'])) {
                            echo("<br><br>Catégorie: ".$infosAnimal[0]['categorie']);
                        };

                        if (isset($infosAnimal[0]['adoption_sos'])) {
                            echo("<br><br><b>Adoption SOS !</b>");
                        }
                        ?>

                    </p>

                </div>

                <div class="descriptionAnimal">

                    <?=nl2br($infosAnimal[0]['description'])?>

                </div>

            </div>

            <?php if (isset($_SESSION['check']) && $_SESSION['check'] == "log") {echo('<a href="modif-animal.php?id='.$infosAnimal[0]['id'].'" class="btn btn-primary">Modifier</a>
            <a href="appelEtPost/supprAnimal.php?id='.$infosAnimal[0]['id'].'" class="btn btn-danger" onclick="return confirm(\'Etes-vous sûr de vouloir supprimer les informations sur cet animal ?\')">Supprimer</a>');}?>

        </div>

    </main>

<?php require('commun/footer.php'); ?>