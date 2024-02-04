<?php

if (isset($_POST["submit"])) {

    session_start();

    $_SESSION["newOffreMsg"] = "";

    if(isset($_POST["job_title"]) && isset($_POST["job_description"]) && isset($_POST["job_type"]) && !empty($_POST["job_title"]) && !empty($_POST["job_description"]) && !empty($_POST["job_type"])) {

        $title = htmlspecialchars($_POST['job_title']);
        $description = htmlspecialchars($_POST['job_description']);
        $type = htmlspecialchars($_POST['job_type']);

        $bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt= 'INSERT INTO jobs(jobs.titre, jobs.description, jobs.type_offre) VALUES ("'.$title.'","'.$description.'","'.$type.'")';
        $requete = $bdd->query($stmt);

        $_SESSION["newOffreMsg"] = "La nouvelle offre a bien été créée.";

    } else {

        $_SESSION["newOffreMsg"] = "Tous les champs n'ont pas été remplis.";

    }

} else {

    header("Location: ./index.php");
    exit;

};
header("Location: ./new-offre.php");
exit;