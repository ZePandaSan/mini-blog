<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


$id = $_GET["id"];
$requete = $bdd->prepare('DELETE FROM postSujet WHERE id = '.$id);
$requete->execute();
header('Location: index.php');