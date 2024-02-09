<?php
if (isset($_POST["submit"])) {

    session_start();

    $_SESSION["newActuMsg"] = "";

    if (isset($_POST["article_title"]) && isset($_POST["article_content"]) && !empty($_POST["article_title"]) && !empty($_POST["article_content"])) {

        date_default_timezone_set('Europe/Paris');
        $datetime = new DateTime();

        $date = $datetime->format('Y-m-d H:i:s');
        $title = htmlspecialchars($_POST['article_title']);
        $content = htmlspecialchars($_POST['article_content']);

        $targetDir = "../medias/images/photos_actus/";

        require('dbconnect.php');

        if (empty($_FILES["article_picture"]["name"])) {

            $stmt= 'INSERT INTO actualites(actualites.title, actualites.content, actualites.creation_date) VALUES ("'.$title.'","'.$content.'","'.$date.'")';
            $requete = $bdd->query($stmt);

            $_SESSION["newActuMsg"] = "La nouvelle actualité a bien été créée.";

        } else {

            $imageName = basename($_FILES["article_picture"]["name"]);
            $targetFilePath = $targetDir . $imageName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            $nomsImages = $bdd->query("SELECT actualites.image_name FROM actualites WHERE actualites.image_name = '$imageName'");
            $copieNomsImages = $nomsImages->fetchall(PDO::FETCH_ASSOC);

            if ($copieNomsImages) {

                $_SESSION["newActuMsg"] = "Il y a déjà une image avec ce nom.";

            } else {

                // Allow certain file formats        
                $allowTypes = array('jpg','png','jpeg','jfif');
                if(in_array($fileType, $allowTypes)){ 

                    // Upload file to server 
                    if(move_uploaded_file($_FILES["article_picture"]["tmp_name"], $targetFilePath)){ 

                        // Insert into database
                
                        $stmt= 'INSERT INTO actualites(actualites.title, actualites.image_name, actualites.content, actualites.creation_date) VALUES ("'.$title.'","'.$imageName.'","'.$content.'","'.$date.'")';
                        $requete = $bdd->query($stmt);
                        
                        if ($requete) {

                            $_SESSION["newActuMsg"] = "La nouvelle actualité a bien été créée.";

                        } else {

                            $_SESSION["newActuMsg"] = "L'actualité n'a pas pu être créée.";

                        };

                    } else {

                        $_SESSION["newActuMsg"] = "L'image n'a pas pu être téléversée.";

                    };
                
                } else {

                    $_SESSION["newActuMsg"] = "Seuls les fichiers .jpg, .png, .jpeg et .jfif peuvent être téléversés.";

                };

            }

        };

    } else {

        $_SESSION["newActuMsg"] = "Au moins l'un des champs n'a pas été renseigné.";

    }

} else {
    header("Location: ../index.php");
    exit;
};
header("Location: ../new-actualite.php");
exit;