<?php include_once 'function.php';

class addPost{
    
    private $sujet;
    private $name;
    private $bdd;
    
    public function __construct($name,$sujet) {
        
        
        $this->sujet = htmlspecialchars($sujet);
        $this->name = htmlspecialchars($name);
        $this->bdd = bdd();
        
    }
    
    
    public function verif(){
        
           if(strlen($this->sujet) > 0){ /*Si on a bien un sujet*/
                
                return 'ok';
            }
            else {/*Si on a pas de contenu*/
                $erreur = 'Veuillez entrer le contenu du sujet';
                return $erreur;
            }
            
      
        
    }
    
    public function insert(){
       
        
        $requete2 = $this->bdd->prepare('INSERT INTO postSujet(propri,contenu,date,sujet) VALUES(:propri,:contenu,NOW(),:sujet)');
        $requete2->execute(array('propri'=>$_SESSION['id'],'contenu'=>  $this->sujet,'sujet'=>  $this->name));
        
        return 1;
    }
    
}