<?php 
require_once 'bdd.php';
class personnes extends BDD{

    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $email;
    private string $fidelite;
    private string $mdp;

public function __construct( $n, $p, $a, $e, $f, $m)
{
    parent::construct();
    $this->nom = $n;
    $this->prenom = $p;
    $this->adresse = $a;
    $this->email = $e;
    $this->fidelite = $f;
    $this->mdp = $m;
}
public function getNom(){


    
     var_dump($result);
     foreach($result as $n){
         $a = $n["nom_personnes"];
         echo  $a;    
        }

    }

public function setNom(){
    $resultM = $this->prepare("INSERT INTO personnes(nom_personnes, prenom, adresse, email, fidelite, mot_de_passe) VALUES(:n, :p, :a, :e, :f, :m)");

    $resultM->bindParam(":n", $this->nom);
    $resultM->bindParam(":p", $this->prenom);
    $resultM->bindParam(":a", $this->adresse);
    $resultM->bindParam(":e", $this->email);
    $resultM->bindParam(":f", $this->fidelite);
    $resultM->bindParam(":m", $this->mdp);
    $resultM->execute();


}
public function save(){

}
}

$variable = new personnes('jeoleoe','frejfrjj','jeoleoe','frejfrjj','jeoleoe','frejfrjj');
$variable->setNom();
// $variable->getNom();