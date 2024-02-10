<?php
session_start();

if (isset($_SESSION["check"]) && isset($_SESSION["userID"])) {

    unset($_SESSION["check"]);
    unset($_SESSION["userID"]);

};
header("Location: ../index.php");
exit;