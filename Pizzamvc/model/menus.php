<?php
require 'db.php';
    
    /**
     * gerer les menus
     */
    class menus extends DB{
    private $nom_menus;
    private $image_menus;
    private $prix_menus;
    private $description_menus;
    private $best_seller;
    private $points_menus;
    
    /**
     * __construct
     *
     * @param  mixed $nom le nom du menus
     * @param  mixed $image le lien de l'image
     * @param  mixed $prix le prix du menus
     * @param  mixed $description la description du menu
     * @param  mixed $best la meilleure vente
     * @param  mixed $points les de fidelités apportés
     * @return void surcharge du construct pour le bypass
     */
    public function __construct(string $nom = "", string $image = "", string $prix = "", string $description = '',string $best = '', int $points = 0)
    {
        parent::__construct();
        $this->nom_menus = $nom;
        $this->image_menus = $image;
        $this->prix_menus = $prix;
        $this->description_menus = $description;
        $this->best_seller = $best;
        $this->points_menus = $points;
    }
public static function getById(int $id){
        $menus = new menus;
        $req = $menus->prepare("SELECT * FROM menus Where id = :id");
        $req->bindParam(":id",$id);
        $req->execute();
        $lesMenus = $req->fetchAll(PDO::FETCH_CLASS, "menus");
        if(sizeof($lesMenus) >0 ){
            return $lesMenus[0];
        }else{
            return new menus(); // ou null
        }
    }
    public function getAllProduits(){

        $produit = new produits();
        $requete = $produit->prepare("select * from produits");
        $requete->execute();
        $resultat = $requete->fetchall(PDO::FETCH_OBJ);
        return $resultat;
    }
    public function getSearch(string $motEntree){
        
            $recherche = new produits;
            $req = $recherche->prepare("select * from produits where nom like '%$motEntree%'");
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