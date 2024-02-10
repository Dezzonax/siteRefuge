<?php
session_start();

if (isset($_POST["submit"]) && isset($_SESSION['check']) && $_SESSION['check'] == "log") {

    $_SESSION["modifActuMsg"] = "";

    if (isset($_POST["article_title"]) && isset($_POST["article_content"]) && !empty($_POST["article_title"]) && !empty($_POST["article_content"]) && isset($_POST["submit"]) && !empty($_POST["submit"])) {

        require('dbconnect.php');

        $actualite = $bdd->query("SELECT actualites.title, actualites.content FROM actualites WHERE actualites.id = {$_POST["submit"]}");

        $donneesActualite = $actualite->fetchall(PDO::FETCH_ASSOC);

        if ($_POST["article_title"] != $donneesActualite[0]['title'] || $_POST["article_content"] != $donneesActualite[0]['content']) {

            date_default_timezone_set('Europe/Paris');
            $datetime = new DateTime();
    
            $date = $datetime->format('Y-m-d H:i:s');
            $title = htmlspecialchars($_POST['article_title']);
            $content = htmlspecialchars($_POST['article_content']);

            $stmt= "UPDATE actualites SET actualites.title = '$title', actualites.content = '$content', actualites.edit_date = '$date' WHERE actualites.id = '{$_POST["submit"]}'";
            $requete = $bdd->query($stmt);

            $_SESSION["modifActuMsg"] = "L'actualité a bien été modifiée.";

        }

    } else {

        $_SESSION["modifActuMsg"] = "Au moins l'un des champs n'a pas été renseigné.";

    }

} else {

    header("Location: ../index.php");
    exit;

};

header("Location: ../modif-actualite.php?id=".$_POST["submit"]);
exit;