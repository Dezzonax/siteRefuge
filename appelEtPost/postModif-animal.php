<?php
session_start();

if (isset($_POST["submit"])) {

    $_SESSION["modifAnimalMsg"] = "";

    if (isset($_POST["animal_name"]) && isset($_POST["animal_type"]) && isset($_POST["animal_mfi"]) && isset($_POST["animal_description"]) && !empty($_POST["animal_name"]) && !empty($_POST["animal_type"]) && !empty($_POST["animal_mfi"]) && !empty($_POST["animal_description"]) && !empty($_POST["submit"])) {

        require('dbconnect.php');

        $animal = $bdd->query("SELECT * FROM animals WHERE animals.id = {$_POST["submit"]}");

        $donneesAnimal = $animal->fetchall(PDO::FETCH_ASSOC);

        $animal_name = htmlspecialchars($_POST["animal_name"]);
        $animal_type = htmlspecialchars($_POST["animal_type"]);
        $animal_mfi = htmlspecialchars($_POST["animal_mfi"]);
        $animal_description = htmlspecialchars($_POST["animal_description"]);

        $stmt = "UPDATE animals SET animals.name = '$animal_name', animals.animal_type = '$animal_type', animals.mfi = '$animal_mfi', animals.description = '$animal_description'";

        if (isset($donneesAnimal[0]['animal_race'])) {

            $animal_race = htmlspecialchars($_POST["animal_race"]);

            if (!empty($_POST["animal_race"])) {
                $stmt = $stmt.", animals.animal_race = '$animal_race'";
            } else {
                $stmt = $stmt.", animals.animal_race = NULL";
            }

        } elseif (!empty($_POST["animal_race"])) {
            $animal_race = htmlspecialchars($_POST["animal_race"]);
            $stmt = $stmt.", animals.animal_race = '$animal_race'";
        };

        if (isset($donneesAnimal[0]['birthdate'])) {

            $animal_birthdate = htmlspecialchars($_POST["animal_birthdate"]);

            if (!empty($_POST["animal_birthdate"])) {
                $stmt = $stmt.", animals.birthdate = '$animal_birthdate'";
            } else {
                $stmt = $stmt.", animals.birthdate = NULL";
            }

        } elseif (!empty($_POST["animal_birthdate"])) {
            $animal_birthdate = htmlspecialchars($_POST["animal_birthdate"]);
            $stmt = $stmt.", animals.birthdate = '$animal_birthdate'";
        };

        if (isset($donneesAnimal[0]['maison'])) {

            $animal_maison = htmlspecialchars($_POST["animal_maison"]);

            if (!empty($_POST["animal_maison"])) {
                $stmt = $stmt.", animals.maison = '$animal_maison'";
            } else {
                $stmt = $stmt.", animals.maison = NULL";
            }

        } elseif (!empty($_POST["animal_maison"])) {
            $animal_maison = htmlspecialchars($_POST["animal_maison"]);
            $stmt = $stmt.", animals.maison = '$animal_maison'";
        };

        if (isset($donneesAnimal[0]['appartement'])) {

            $animal_appartement = htmlspecialchars($_POST["animal_appartement"]);

            if (!empty($_POST["animal_appartement"])) {
                $stmt = $stmt.", animals.appartement = '$animal_appartement'";
            } else {
                $stmt = $stmt.", animals.appartement = NULL";
            }

        } elseif (!empty($_POST["animal_appartement"])) {
            $animal_appartement = htmlspecialchars($_POST["animal_appartement"]);
            $stmt = $stmt.", animals.appartement = '$animal_appartement'";
        };

        if (isset($donneesAnimal[0]['enfants'])) {

            $animal_enfants = htmlspecialchars($_POST["animal_enfants"]);

            if (!empty($_POST["animal_enfants"])) {
                $stmt = $stmt.", animals.enfants = '$animal_enfants'";
            } else {
                $stmt = $stmt.", animals.enfants = NULL";
            }

        } elseif (!empty($_POST["animal_enfants"])) {
            $animal_enfants = htmlspecialchars($_POST["animal_enfants"]);
            $stmt = $stmt.", animals.enfants = '$animal_enfants'";
        };

        if (isset($donneesAnimal[0]['chiens'])) {

            $animal_chiens = htmlspecialchars($_POST["animal_chiens"]);

            if (!empty($_POST["animal_chiens"])) {
                $stmt = $stmt.", animals.chiens = '$animal_chiens'";
            } else {
                $stmt = $stmt.", animals.chiens = NULL";
            }

        } elseif (!empty($_POST["animal_chiens"])) {
            $animal_chiens = htmlspecialchars($_POST["animal_chiens"]);
            $stmt = $stmt.", animals.chiens = '$animal_chiens'";
        };

        if (isset($donneesAnimal[0]['chats'])) {

            $animal_chats = htmlspecialchars($_POST["animal_chats"]);

            if (!empty($_POST["animal_chats"])) {
                $stmt = $stmt.", animals.chats = '$animal_chats'";
            } else {
                $stmt = $stmt.", animals.chats = NULL";
            }

        } elseif (!empty($_POST["animal_chats"])) {
            $animal_chats = htmlspecialchars($_POST["animal_chats"]);
            $stmt = $stmt.", animals.chats = '$animal_chats'";
        };

        if (isset($donneesAnimal[0]['categorie'])) {

            $animal_categorie = htmlspecialchars($_POST["animal_categorie"]);

            if (!empty($_POST["animal_categorie"])) {
                $stmt = $stmt.", animals.categorie = '$animal_categorie'";
            } else {
                $stmt = $stmt.", animals.categorie = NULL";
            }

        } elseif (!empty($_POST["animal_categorie"])) {
            $animal_categorie = htmlspecialchars($_POST["animal_categorie"]);
            $stmt = $stmt.", animals.categorie = '$animal_categorie'";
        };

        if (isset($donneesAnimal[0]['adoption_sos'])) {

            $animal_sos = htmlspecialchars($_POST["animal_sos"]);

            if (!empty($_POST["animal_sos"])) {
                $stmt = $stmt.", animals.adoption_sos = '$animal_sos'";
            } else {
                $stmt = $stmt.", animals.adoption_sos = NULL";
            }

        } elseif (!empty($_POST["animal_sos"])) {
            $animal_sos = htmlspecialchars($_POST["animal_sos"]);
            $stmt = $stmt.", animals.adoption_sos = '$animal_sos'";
        };

        $stmt = $stmt." WHERE animals.id = '{$_POST["submit"]}'";
        $requete = $bdd->query($stmt);

        $_SESSION["modifAnimalMsg"] = "Les informations ont bien été modifiées.";

    } else {

        $_SESSION["modifAnimalMsg"] = "Au moins l'un des champs requis n'a pas été rempli.";

    }

} else {
    header("Location: ./index.php");
    exit;
};
header("Location: ../modif-animal.php?id=".$_POST["submit"]);
exit;