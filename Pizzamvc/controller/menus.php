<?php
require 'bdd.php';

    // OBJET MENUS
    class menus extends BDD{
    private $nom_menus;
    private $image_menus;
    private $prix_menus;
    private $description_menus;
    private $best_seller;
    private $points_menus;

    function __construct()
    {
        parent::construct();
    }
    public function setAll(string $n_m = '', string $i_m ='', int $pr_m=0, string $d_m='', bool $b_s=false, int $p_m=0){
        $this->nom_menus = $n_m;
        $this->image_menus = $i_m;
        $this->prix_menus = $pr_m;
        $this->description_menus = $d_m;+
        $this->best_seller = $b_s;
        $this->points_menus = $p_m;
    } 
    public static function getById(int $id):menus{
        $menus = new menus;
        $req = $menus->prepare("SELECT * FROM menus Where id_menus = :id");
        $req->bindParam(":id",$id);
        $req->execute();
        $lesMenus = $req->fetchAll(PDO::FETCH_CLASS, "menus");
        if(sizeof($lesMenus) >0 ){
            return $lesMenus[0];
        }else{
            return new menus(); // ou null
        }
    }
    public static function getByName(string $name):menus{
        $menus = new menus;
        $req = $menus->prepare("SELECT * FROM menus where nom_menus = :name");
        $req->bindParam(":name", $name);
        $req->execute();
        $nomsMenus = $req->fetchALL(PDO::FETCH_CLASS, "menus");
        if(sizeof($nomsMenus) > 0){
             return $nomsMenus[0];
        }else{
            return new menus();
        }
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

$first = new menus();
$first->setAll("fromageee", "img/", 80000, "fromgee", true, 1000);
$first->save();


?>