<?php session_start();
include_once 'function/function.php';
include_once 'function/connexion.class.php';
$bdd = bdd();
if(isset($_POST['pseudo']) AND isset($_POST['mdp'])){
    
    $connexion = new connexion($_POST['pseudo'],$_POST['mdp']);
    $verif = $connexion->verif();
    if($verif =="ok"){
      if($connexion->session()){
          header('Location: index.php');
      }
    }
    else {
        $erreur = $verif; 
    } 
}


?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Blog</title>
    
    <meta name="authors" content="Wassim Saidane and Aurélien Authier"> 
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
 <h1>Connexion</h1>
    
            <div id="Cforum">
                <form method="post" action="connexion.php">
                    <p>
                        <input name="pseudo" type="text" placeholder="Pseudo..." required /><br>
                        <input name="mdp" type="password" placeholder="Mot de passe..." required /><br>
                        <input type="submit" value="Connexion !" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </p>
                </form> 
                
            </div>
</body>
</html>
