<?php session_start();
include_once 'function/function.php';
include_once 'function/addPost.class.php';
include_once 'function/delete.class.php';
$bdd = bdd();

if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
        $addPost = new addPost($_POST['name'],$_POST['sujet']);
        $verif = $addPost->verif();
        if($verif == "ok"){
            if($addPost->insert()){
            
            }
        }
        else {/*Si on a une erreur*/
            $erreur = $verif;
        }
    
    }

/*if(!isset($_SESSION['id'])){

    header('Location: inscription.php');
}
else {
    
    if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
        $addPost = new addPost($_POST['name'],$_POST['sujet']);
        $verif = $addPost->verif();
        if($verif == "ok"){
            if($addPost->insert()){
            
            }
        }
        else {Si on a une erreur
            $erreur = $verif;
        }
    
    }
}*/    
    
    ?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Blog</title>
    
    <link rel="stylesheet" type="text/css" href="css/style.css" />
<head>
<body>
    <header>
	    <ul class="main-nav">
		    <a href="connexion.php">Se connecter</a>
            <a href="inscription.php">S'inscrire</a>
            <a href="index.php">Home</a>
	    </ul>
    </header>
 <h1>Bienvenue sur le blog</h1>
    
            <div id="Cforum">
                <?php 
                
                if (isset($_SESSION['id'])) {
                    echo 'Bienvenue : '.$_SESSION['pseudo'].' - <a href="deconnexion.php">Se déconnecter</a> ';
                }
                if(isset($_GET['categorie'])){ /*SI on est dans une categorie*/
                    $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
                    ?>
                    <div class="categories">
                      <h1><?php echo $_GET['categorie']; ?></h1>
                    </div>
                <?php 
                if (isset($_SESSION['id'])) {
                    ?>
                    <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a>
                    <?php 
                } 
                ?>
                
                <?php 
                $requete = $bdd->prepare('SELECT * FROM sujet WHERE categorie = :categorie ');
                $requete->execute(array('categorie'=>$_GET['categorie']));
                while($reponse = $requete->fetch()){
                    ?>
                     <div class="categories">
                         <a href="index.php?sujet=<?php echo $reponse['name'] ?>"><h1><?php echo $reponse['name'] ?></h1></a>
                    </div>
                    <?php
                }
                ?>
                
                    
                    <?php
                }
                
                else if(isset($_GET['sujet'])){ /*SI on est dans une categorie*/
                    $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
                    ?>
                    <div class="categories">
                      <h1><?php echo $_GET['sujet'];?></h1>
                      <!--<a href="deleteSujet.php?id=<?php echo $_GET['sujet']; ?>">Supprimer le sujet</a>-->
                    </div>
                    
                
                <?php 
                $requete = $bdd->prepare('SELECT * FROM postSujet WHERE sujet = :sujet');
                $requete->execute(array('sujet'=>$_GET['sujet']));
                while($reponse = $requete->fetch()){
                    ?>
                <div class="Cforum">
                    
                    <?php 
                     $requete2 = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
                     $requete2->execute(array('id'=>$reponse['propri']));
                     $membres = $requete2->fetch();
                     echo $membres['pseudo']; 
                     echo ' le ';
                     echo $reponse['date']; 
                     echo ': <br>';
                     
                     echo $reponse['contenu'];
                    ?>
                    <?php 
                    
                if(!isset($_SESSION['id'])){
                    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> Pour pouvoir répondre à l'article vous devez être connecté à un compte";
                }
                else { 
                ?>
                    
                        <?php
                        //echo $_GET['sujet'];
                        //echo $_GET['sujet'];
                        //echo $_GET[$reponse['id']];
                        ?>
                        <?php
                        if ($_SESSION['id']==$reponse['propri']) { 
                        ?>
                        
                        <form method="post" action="update.php?id=<?php echo $reponse['id']; ?>">
                            <textarea name="contenu" placeholder="Modifier le commentaire..." ></textarea>
                            <button id="modif" type="submit">Modifier</button>
                            <a id="supr" href="delete.php?id=<?php echo $reponse['id']; ?>">Supprimer</a>
                        </form>
                        
                        
                        <?php
                        }
                        ?>
                    
                <?php
                }
                
                ?>
                 </div> 
                <?php
                   
                }
                
                ?>
                <form id="rep" method="post" action="index.php?sujet=<?php echo $_GET['sujet']; ?>">
                        <textarea name="sujet" placeholder="Votre message..." ></textarea>
                        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                        <input type="submit" value="Répondre" />

                        
                    </form>
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        //header('Location: index.php');
                        ?>
                <?php
                }
                else { /*Si on est sur la page normal*/
                    
                       
                
                        $requete = $bdd->query('SELECT * FROM categories');
                        while($reponse = $requete->fetch()){
                        ?>
                            <div class="categories">
                                <a href="index.php?categorie=<?php echo $reponse['name']; ?>"><?php echo $reponse['name']; ?></a>
                              </div>
                
                    <?php 
                    }
                    
                }
                 ?>
                
                
                
                
                
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
</body>
</html>

    
