<?php
if (isset($_POST["submit"])) {

    session_start();

    $_SESSION["msgConnexion"] = "";

    if (isset($_POST["username"]) && isset($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password"])) {

        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        require("dbconnect.php");

        $stmt= 'SELECT comptes.id, comptes.password FROM comptes WHERE comptes.username=:username';
        $requete = $bdd->prepare($stmt);
        $requete->execute([':username'=>$username]);
        $donneesUser = $requete->fetchall(PDO::FETCH_ASSOC);

        if(password_verify($password, $donneesUser[0]['password'])){

            $_SESSION['check'] = "log";
            $_SESSION['userID'] = $donneesUser[0]['id'];
    
        }else{

            $_SESSION['msgConnexion'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            header("Location: ../connexion.php");
            exit;

        }

    } else {

        $_SESSION["msgConnexion"] = "Au moins l'un des champs n'a pas été rempli";
        header("Location: ../connexion.php");
        exit;

    }
};
header("Location: ../index.php");
exit;