<?php

if (isset($_POST["submit"])) {

    session_start();

    $_SESSION["newAdopteMsg"] = "";

    if (isset($_POST["adopte_description"]) && isset($_FILES["adopte_picture"]["name"]) && !empty($_POST["adopte_description"]) && !empty($_FILES["adopte_picture"]["name"])) {

        $description = htmlspecialchars($_POST['adopte_description']);

        $targetDir = "medias/images/photos_adoptes/";

        $imageName = basename($_FILES["adopte_picture"]["name"]);
        $targetFilePath = $targetDir . $imageName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier s'il n'y a pas déjà une image avec ce nom
        $nomsImages = $bdd->query("SELECT adoptes.file_name FROM adoptes WHERE adoptes.file_name = '$imageName'");
        $copieNomsImages = $nomsImages->fetchall(PDO::FETCH_ASSOC);

        if ($copieNomsImages) {

            $_SESSION["newAdopteMsg"] = "Il y a déjà une image avec ce nom.";

        } else {

            // Allow certain file formats        
            $allowTypes = array('jpg','png','jpeg','jfif');
            if(in_array($fileType, $allowTypes)){ 

                // Upload file to server 
                if(move_uploaded_file($_FILES["adopte_picture"]["tmp_name"], $targetFilePath)){ 

                    // Insert into database
            
                    $stmt= 'INSERT INTO adoptes(adoptes.description, adoptes.file_name) VALUES ("'.$description.'","'.$imageName.'")';
                    $requete = $bdd->query($stmt);
                    
                    if ($requete) {

                        $_SESSION["newAdopteMsg"] = "Le nouvel adopté a bien été créé.";

                    } else {

                        $_SESSION["newAdopteMsg"] = "Le nouvel adopté n'a pas pu être créé.";

                    };

                } else {

                    $_SESSION["newAdopteMsg"] = "L'image n'a pas pu être téléversée.";

                };

            } else {

                $_SESSION["newAdopteMsg"] = "Seuls les fichiers .jpg, .png, .jpeg et .jfif peuvent être téléversés.";

            };

        }

    } else {

        $_SESSION["newAdopteMsg"] = "Au moins l'un des champs n'a pas été renseigné.";

    }

} else {

    header("Location: ./index.php");
    exit;

};

header("Location: ./new-adopte.php");
exit;