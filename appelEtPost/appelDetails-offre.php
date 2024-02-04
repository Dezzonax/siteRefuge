<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=refuge; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$infos = $bdd->query("SELECT * FROM jobs WHERE jobs.id = {$_GET['id']}");

$infosOffre = $infos->fetchall(PDO::FETCH_ASSOC);

?>