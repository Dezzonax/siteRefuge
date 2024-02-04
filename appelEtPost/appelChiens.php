<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$chiens = $bdd->query("SELECT animals.id, animals.name, animals.animal_race, animals.mfi, animals.file_name, animals.birthdate, animals.adoption_sos FROM animals WHERE animals.animal_type = 'chien'");

$donneesChiens = $chiens->fetchall(PDO::FETCH_ASSOC);

?>