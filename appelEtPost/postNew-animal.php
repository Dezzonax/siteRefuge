<?php
if (isset($_POST["submit"])) {

    session_start();

    $_SESSION["newAnimalMsg"] = "";

    if (isset($_POST["animal_name"]) && isset($_POST["animal_type"]) && isset($_POST["animal_mfi"]) && isset($_POST["animal_description"]) && isset($_FILES["animal_picture"]["name"]) && !empty($_POST["animal_name"]) && !empty($_POST["animal_type"]) && !empty($_POST["animal_mfi"]) && !empty($_POST["animal_description"]) && !empty($_FILES["animal_picture"]["name"])) {

        $animal_name = htmlspecialchars($_POST["animal_name"]);
        $animal_type = htmlspecialchars($_POST["animal_type"]);
        $animal_mfi = htmlspecialchars($_POST["animal_mfi"]);
        $animal_description = htmlspecialchars($_POST["animal_description"]);

        $stmtPart1 = 'INSERT INTO animals(animals.name, animals.animal_type, animals.mfi, animals.description';
        $stmtPart2 = ') VALUE ("'.$animal_name.'","'.$animal_type.'","'.$animal_mfi.'","'.$animal_description.'"';

        if (!empty($_POST["animal_race"])) {
            $animal_race = htmlspecialchars($_POST["animal_race"]);
            $stmtPart1 = $stmtPart1.', animals.animal_race';
            $stmtPart2 = $stmtPart2.',"'.$animal_race.'"';
        };
        if (!empty($_POST["animal_birthdate"])) {
            $animal_birthdate = htmlspecialchars($_POST["animal_birthdate"]);
            $stmtPart1 = $stmtPart1.', animals.birthdate';
            $stmtPart2 = $stmtPart2.',"'.$animal_birthdate.'"';
        };
        if (!empty($_POST["animal_maison"])) {
            $animal_maison = htmlspecialchars($_POST["animal_maison"]);
            $stmtPart1 = $stmtPart1.', animals.maison';
            $stmtPart2 = $stmtPart2.',"'.$animal_maison.'"';
        };
        if (!empty($_POST["animal_appartement"])) {
            $animal_appartement = htmlspecialchars($_POST["animal_appartement"]);
            $stmtPart1 = $stmtPart1.', animals.appartement';
            $stmtPart2 = $stmtPart2.',"'.$animal_appartement.'"';
        };
        if (!empty($_POST["animal_enfants"])) {
            $animal_enfants = htmlspecialchars($_POST["animal_enfants"]);
            $stmtPart1 = $stmtPart1.', animals.enfants';
            $stmtPart2 = $stmtPart2.',"'.$animal_enfants.'"';
        };
        if (!empty($_POST["animal_chiens"])) {
            $animal_chiens = htmlspecialchars($_POST["animal_chiens"]);
            $stmtPart1 = $stmtPart1.', animals.chiens';
            $stmtPart2 = $stmtPart2.',"'.$animal_chiens.'"';
        };
        if (!empty($_POST["animal_chats"])) {
            $animal_chats = htmlspecialchars($_POST["animal_chats"]);
            $stmtPart1 = $stmtPart1.', animals.chats';
            $stmtPart2 = $stmtPart2.',"'.$animal_chats.'"';
        };
        if (!empty($_POST["animal_categorie"])) {
            $animal_categorie = htmlspecialchars($_POST["animal_categorie"]);
            $stmtPart1 = $stmtPart1.', animals.categorie';
            $stmtPart2 = $stmtPart2.',"'.$animal_categorie.'"';
        };
        if (isset($_POST["animal_sos"]) && !empty($_POST["animal_sos"])) {
            $animal_sos = htmlspecialchars($_POST["animal_sos"]);
            $stmtPart1 = $stmtPart1.', animals.adoption_sos';
            $stmtPart2 = $stmtPart2.',"'.$animal_sos.'"';
        };

        $targetDir = "medias/images/photos_animaux/";

        $bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $imageName = basename($_FILES["animal_picture"]["name"]);
        $targetFilePath = $targetDir . $imageName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $nomsImages = $bdd->query("SELECT animals.file_name FROM animals WHERE animals.file_name = '$imageName'");
        $copieNomsImages = $nomsImages->fetchall(PDO::FETCH_ASSOC);

        if ($copieNomsImages) {

            $_SESSION["newAnimalMsg"] = "Il y a déjà une photo avec ce nom.";

        } else {

            // Allow certain file formats        
            $allowTypes = array('jpg','png','jpeg','jfif');
            if(in_array($fileType, $allowTypes)){ 

                // Upload file to server 
                if(move_uploaded_file($_FILES["animal_picture"]["tmp_name"], $targetFilePath)){ 

                    // Insert into database
            
                    $stmt = $stmtPart1.', animals.file_name'.$stmtPart2.',"'.$imageName.'"'.')';

                    // var_dump($stmt);
                    // die;

                    $requete = $bdd->query($stmt);
                    
                    if ($requete) {

                        $_SESSION["newAnimalMsg"] = "Le nouvel animal a bien été ajouté.";

                    } else {

                        $_SESSION["newAnimalMsg"] = "L'animal' n'a pas pu être ajouté.";

                    };

                } else {

                    $_SESSION["newAnimalMsg"] = "La photo n'a pas pu être téléversée.";

                };

            } else {

                $_SESSION["newAnimalMsg"] = "Seuls les fichiers .jpg, .png, .jpeg et .jfif peuvent être téléversés.";

            };

        }

    } else {

        $_SESSION["newAnimalMsg"] = "Au moins l'un des champs requis n'a pas été rempli.";

    }

} else {
    header("Location: ./index.php");
    exit;
};
header("Location: ./new-animal.php");
exit;