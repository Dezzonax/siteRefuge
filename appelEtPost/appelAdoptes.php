<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$adoptes = $bdd->query("SELECT * FROM adoptes");

$donneesAdoptes = $adoptes->fetchall(PDO::FETCH_ASSOC);

?>