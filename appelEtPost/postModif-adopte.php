<?php
session_start();

if (isset($_POST["submit"])) {

    $_SESSION["modifAdopteMsg"] = "";

    if (isset($_POST["adopte_description"]) && !empty($_POST["adopte_description"]) && isset($_POST["submit"]) && !empty($_POST["submit"])) {

        require('dbconnect.php');

        $adopte = $bdd->query("SELECT adoptes.description FROM adoptes WHERE adoptes.id = {$_POST["submit"]}");

        $donneesAdopte = $adopte->fetchall(PDO::FETCH_ASSOC);

        if ($_POST["adopte_description"] != $donneesAdopte[0]['description']) {

            $description = htmlspecialchars($_POST['adopte_description']);

            $stmt= "UPDATE adoptes SET adoptes.description = '$description' WHERE adoptes.id = '{$_POST["submit"]}'";
            $requete = $bdd->query($stmt);

            $_SESSION["modifAdopteMsg"] = "La description a bien été modifiée.";

        }

    } else {

        $_SESSION["modifAdopteMsg"] = "La description ne peut pas être vide.";

    }

} else {
    header("Location: ./index.php");
    exit;
};
header("Location: ../modif-adopte.php?id=".$_POST["submit"]);
exit;