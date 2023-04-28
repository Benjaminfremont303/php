<?php
require 'db.php';
    
    /**
     * gerer les menus
     */
    class menus extends DB{
    protected $id;      
    protected $nom;
    protected $image;
    protected $prix;
    protected $description;
    protected $best_seller;
    protected $points;
    
public function __construct(int $id = 0, string $nom = "", string $image = "", string $prix = "", string $description = '',string $best = '', int $point = 0)
    {
        parent::__construct();
        $this->id= $id;
        $this->nom = $nom;
        $this->image = $image;
        $this->prix = $prix;
        $this->description = $description;
        $this->best_seller = $best;
        $this->points = $point; 
    }
/**
 * getById
 *
 * @param  mixed $id entrez pour trouver l'objet
 * @return void retourne l'objet
 */
public function getById(int $id)
    {
        $requete = $this->prepare("SELECT * FROM menus where id=:id");
        $requete->bindParam(":id", $id);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'menus');
        $resultat = $requete->fetch();

        // Si il y a un résultats, on retourne ce résultat
        if ($resultat) {
            return $resultat;
        } else {
            $personnes->setNom("L'id $id n'existe pas ");
        }
    }
/**
 * getAllMenus
 *
 * @return void afficher la table menus
 */
public function getAllMenus(){
        $requete = $this->prepare("select * from menus");
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE);
        $resultat = $requete->fetchall();
        return $resultat;
    }
/**
 * getSearch
 *
 * @param  mixed $motEntree mot entré par l'utilisateur
 * @return void la recherche est retournée
 */
public function getSearch(string $motEntree){    
        $req = $this->prepare("select * from menus where nom like '%$motEntree%'");
        $req->execute();
        $resultat = $req->fetchall(PDO::FETCH_OBJ);
        return $resultat;
}
    function save(){
        $req = $this->prepare("SELECT * FROM menus where nom_menus =:name");
        $req->bindParam(":name",$this->nom_menus);
        $req->execute();
        $existe = $req->fetchALL(PDO::FETCH_CLASS, "menus");
        
        if(sizeof($existe) > 0){ 
        $resultM = $this->prepare("UPDATE menus set nom_menus =:nom_menus, image_menus =:image_menus, prix_menus =:prix_menus, description_menus=:description_menus, best_seller=:best_seller, points_menus=:points_menus where nom_menus =:nom_menus");
        $resultM->bindParam(":nom_menus", $this->nom_menus);
        $resultM->bindParam(":image_menus", $this->image_menus);
        $resultM->bindParam(":prix_menus", $this->prix_menus);
        $resultM->bindParam(":description_menus", $this->description_menus);
        $resultM->bindParam(":best_seller", $this->best_seller);
        $resultM->bindParam(":points_menus", $this->points_menus);
        $resultM->execute();
       
    }else{
        
        $resultM = $this->prepare("INSERT INTO menus(nom_menus, image_menus, prix_menus, description_menus, best_seller, points_menus) VALUES(:nom_menus, :image_menus, :prix_menus, :description_menus, :best_seller, :points_menus)");
        $resultM->bindParam(":nom_menus", $this->nom_menus);
        $resultM->bindParam(":image_menus", $this->image_menus);
        $resultM->bindParam(":prix_menus", $this->prix_menus);
        $resultM->bindParam(":description_menus", $this->description_menus);
        $resultM->bindParam(":best_seller", $this->best_seller);
        $resultM->bindParam(":points_menus", $this->points_menus);
        $resultM->execute();
        
        }
    }
}

/* $first = new menus();
$first->setAll("fromageee", "img/", 80000, "fromgee", true, 1000);
$first->save(); */


?>