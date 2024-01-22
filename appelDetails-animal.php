<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$infos = $bdd->query("SELECT animals.name, animals.animal_type, animals.animal_race, animals.mfi, animals.file_name, animals.birthdate, animals.description, animals.maison, animals.appartement, animals.enfants, animals.chiens, animals.chats, animals.categorie FROM animals WHERE animals.id = {$_GET['id']}");

$infosAnimal = $infos->fetchall(PDO::FETCH_ASSOC);

?>