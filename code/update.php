<?php session_start();
include_once 'function/function.php';
$bdd = bdd();


$id = $_GET["id"];
$contenu = $_POST['contenu'];
echo $id;
echo $contenu;
$requete = $bdd->prepare('UPDATE postSujet SET contenu = :contenu WHERE id= :id');
$requete->bindParam(':contenu', $contenu, PDO::PARAM_INT);
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();
header('Location: index.php');