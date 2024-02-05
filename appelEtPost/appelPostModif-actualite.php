<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$actualite = $bdd->query("SELECT actualites.id, actualites.title, actualites.content FROM actualites WHERE actualites.id = {$_POST["submit"]}");

$donneesActualite = $actualite->fetchall(PDO::FETCH_ASSOC);

?>