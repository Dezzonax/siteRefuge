<?php
    require('appelDetails-animal.php');

    if (!$infosAnimal) {
        $_SESSION["msgErreurIndex"] = "La page à laquelle vous essayez d'accéder n'éxiste pas ou plus.";
        header("Location: ./index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'animal - Refuge de Reims</title>

<?php
require('commun/header.php');
?>
    
    <main>

        <div class="container">

            <div class="infosAnimal">

                <div class="infosNotes">

                    <img src="./medias/images/photos_animaux/<?=$infosAnimal[0]['file_name']?>" alt="photo de <?=ucfirst($infosAnimal[0]['name'])?>" class="image-detail-animal">

                    <p class="notes-detail-animal">

                        <b><?=ucfirst($infosAnimal[0]['name'])?></b>,

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

                    <?=$infosAnimal[0]['description']?>

                </div>

            </div>

        </div>

    </main>

<?php
require('commun/footer.php');
?>