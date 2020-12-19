<?php session_start();
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
<head>
    <meta charset='utf-8' />
    <title>Blog</title>
    
    <meta name="authors" content="Wassim Saidane and Aurélien Authier"> 
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
 <h1>Inscription</h1>
    
            <div id="Cforum">
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
</body>
</html>
