<?php session_start();
include_once 'function/function.php';
include_once 'function/addSujet.class.php';
$bdd = bdd();

if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
    $addSujet = new addSujet($_POST['name'],$_POST['sujet'],$_POST['categorie']);
    $verif = $addSujet->verif();
    if($verif == "ok"){
        if($addSujet->insert()){
            header('Location: index.php?sujet='.$_POST['name']);
        }
    }
    else {/*Si on a une erreur*/
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
 <h1>Ajouter un sujet</h1>
    
            <div id="Cforum">
                <?php  echo 'Bienvenue : '.$_SESSION['pseudo'].' :) - <a href="deconnexion.php">Deconnexion</a> '; ?>
                
                <form method="post" action="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">
                    <p>
                        <br><input type="text" name="name" placeholder="Nom du sujet..." required/><br>
                        <textarea name="sujet" placeholder="Contenu du sujet..."></textarea><br>
                        <input type="hidden" value="<?php echo $_GET['categorie']; ?>" name="categorie" />
                        <input type="submit" value="Ajouter le sujet" />
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
