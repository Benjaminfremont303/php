<?php 
require '../model/bdd.php';

class personnes extends BDD{
    
    private string $nom_personnes;
    private string $prenom;
    private string $adresse;
    private string $email;
    private string $fidelite;
    private string $mot_de_passe;

    public function setAll($n = '', $p = '', $a = '', $e = '', $f = '', $m = ''){  
        
        $this->nom_personnes = $n;
        $this->prenom = $p;
        $this->adresse = $a;
        $this->email = $e;
        $this->fidelite = $f;
        $this->mot_de_passe = $m;
    } 
    public function __construct()
    {
        parent::__construct();
    }


    public static function getById(int $id): personnes {

        $personnes = new personnes();
        $req = $personnes->prepare("SELECT *  FROM personnes WHERE id_personnes = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $objet = $req->fetchAll(PDO::FETCH_CLASS, "personnes");     
        if(sizeof($objet)>0) {
            return $objet[0]; 
        }
        else {
            return new personnes();
        }
    }
    public static function getByEmail(string $mail, string $mdp){
        $personnes = new personnes();
        $req = $personnes->prepare("SELECT * FROM personnes WHERE email = :email");
        $req->bindParam(":email", $mail, PDO::PARAM_STR);
        $req->execute();
        $objet2 = $req->fetchAll(PDO::FETCH_CLASS, "personnes");

        if(sizeof($objet2)>0 && password_verify($mdp,$objet2[0]->mot_de_passe)){
            $_SESSION['Id_personnes'] = $objet2[0]->Id_personnes;
            $_SESSION['nom_personnes'] = $objet2[0]->nom_personnes;
            $_SESSION['prenom'] = $objet2[0]->prenom;
            return $objet2;      
        }
        else{
            return false;
        }
    }


    public function save(){
        $req = $this->prepare("SELECT *  FROM personnes WHERE email = :email");
        $req->bindParam(":email", $this->email);
        $req->execute();
        $existe = $req->fetchAll(PDO::FETCH_CLASS, "personnes");

        if(sizeof($existe) > 0){ // sizeof($existe) == sizeof(existe) > 0
            $resultM = $this->prepare("UPDATE personnes set nom_personnes =:n, prenom=:p, adresse=:a, fidelite=:f, mot_de_passe=:m WHERE email = :e");
        }
        else{
            $resultM = $this->prepare("INSERT INTO personnes(nom_personnes, prenom, adresse, email, fidelite, mot_de_passe) VALUES(:n, :p, :a, :e, :f, :m)");
 
        }   
        $resultM->bindParam(":n", $this->nom_personnes);
        $resultM->bindParam(":p", $this->prenom);
        $resultM->bindParam(":a", $this->adresse);
        $resultM->bindParam(":e", $this->email);
        $resultM->bindParam(":f", $this->fidelite);
        $resultM->bindParam(":m", $this->mot_de_passe);
        $resultM->execute();
    }
}
// $variable = new personnes();
// $variable->setAll('lechhhhhat','frdddddddddddddddddddddddddddddddj','jeoljjeoe','54454kkkkdjjjd5@mrjj','jejhjjhjoleoe','frjj');
// $variable->save();




// $variable->getNom();
