<?php session_start();
include_once 'function/function.php';
$bdd = bdd();

$id = $_GET["id"];
echo $id;
$requete = $bdd->prepare('DELETE FROM postSujet WHERE name = '.$id);
$requete->execute();
header('Location: index.php');