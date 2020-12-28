<?php include_once 'function.php';

class connexion{
    
    private $pseudo; 
    private $mdp;
    private $bdd;
    
    public function __construct($pseudo,$mdp) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->bdd = bdd();
    }
    
    public function verif(){
        
        $requete = $this->bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $requete->execute(array('pseudo'=> $this->pseudo));
        $reponse = $requete->fetch();
        if($reponse){
            
            if($this->mdp == $reponse['mdp']){
                return 'ok';
            }
            else {
                $erreur = 'Le mot de passe est incorrect';
                return $erreur;
            }
            
            
        }
        else {
            $erreur = 'Le pseudo est inéxistant';
            return $erreur;
         }
        
        
    }
    
    public function session(){
        $requete = $this->bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo ');
        $requete->execute(array('pseudo'=>  $this->pseudo));
        $requete = $requete->fetch();
        $_SESSION['id'] = $requete['id'];
        $_SESSION['pseudo'] = $this->pseudo;
        
        return 1;
    }
    
    
}