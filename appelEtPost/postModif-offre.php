<?php
session_start();

if (isset($_POST["submit"])) {

    $_SESSION["modifOffreMsg"] = "";

    if (isset($_POST["job_title"]) && !empty($_POST["job_title"]) && isset($_POST["job_description"]) && !empty($_POST["job_description"]) && isset($_POST["submit"]) && !empty($_POST["submit"])) {

        require('dbconnect.php');

        $offre = $bdd->query("SELECT jobs.titre, jobs.description FROM jobs WHERE jobs.id = {$_POST["submit"]}");

        $donneesOffre = $offre->fetchall(PDO::FETCH_ASSOC);

        if ($_POST["job_title"] != $donneesOffre[0]['titre'] || $_POST["job_description"] != $donneesOffre[0]['description']) {

            $titre = htmlspecialchars($_POST['job_title']);
            $description = htmlspecialchars($_POST['job_description']);

            $stmt= "UPDATE jobs SET jobs.titre = '$titre', jobs.description = '$description' WHERE jobs.id = '{$_POST["submit"]}'";
            $requete = $bdd->query($stmt);

            $_SESSION["modifOffreMsg"] = "L'offre a bien étée modifiée.";

        }

    } else {

        $_SESSION["modifOffreMsg"] = "L'un des champs n'a pas été rempli.";

    }

} else {
    header("Location: ../index.php");
    exit;
};
header("Location: ../modif-offre.php?id=".$_POST["submit"]);
exit;