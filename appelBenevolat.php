<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$benevolats = $bdd->query("SELECT jobs.id, jobs.titre FROM jobs WHERE jobs.type_offre = 2");

$donneesBenevolats = $benevolats->fetchall(PDO::FETCH_ASSOC);

?>