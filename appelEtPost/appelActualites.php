<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$actualites = $bdd->query("SELECT actualites.id, actualites.title, actualites.image_name, actualites.content, actualites.creation_date, actualites.edit_date FROM actualites");

$donneesActualites = $actualites->fetchall(PDO::FETCH_ASSOC);

?>