<?php
include_once 'function/function.php';
include_once 'function/inscription.class.php';
$bdd = bdd();

if(isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['mdp'])  AND isset($_POST['mdp2'])){
  
    $inscription = new inscription($_POST['pseudo'],$_POST['email'],$_POST['mdp'],$_POST['mdp2']);
    $verif = $inscription->verif();
    if($verif == "ok"){/*Tout est bon*/
     if($inscription->enregistrement()){
            if($inscription->session()){ /*Tout est mis en session*/
                header('Location: index.php');
            }
        }
        else{ /*Erreur lors de l'enregistrement*/
            echo 'Une erreur est survenue';
        }   
    } else {
       $erreur = $verif;
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>S'inscrire</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom Theme files -->
<link href="css/formulaire.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
    <!-- main -->
<header>
	    <ul class="main-nav">
		    <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
            <a href="index.php">Home</a>
	    </ul>
    </header>
		<h1>Inscription</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post" action="inscription.php">
                    <p>
                        <input name="pseudo" type="text" placeholder="Pseudo..." required /><br>
                        <input name="email" type="text" placeholder="Adresse email..." required /><br>
                        <input name="mdp" type="password" placeholder="Mot de passe..." required /><br>
                        <input name="mdp2" type="password" placeholder="Confirmation..." required /><br>
                        <input type="submit" value="S'inscrire!" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </p>
                </form> 
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>