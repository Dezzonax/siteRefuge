<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$infos = $bdd->query("SELECT * FROM animals WHERE animals.id = {$_GET['id']}");

$infosAnimal = $infos->fetchall(PDO::FETCH_ASSOC);

?>