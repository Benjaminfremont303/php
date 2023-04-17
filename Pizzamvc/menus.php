<?php
 
include "pdo.php";

    // OBJET MENUS
    class menus extends DB{
    private $nom_menus;
    private $image_menus;
    private $prix_menus;
    private $description_menus;
    private $best_seller;
    private $points_menus;
    function __construct(string $n_m, string $i_m, int $pr_m, string $d_m, bool $b_s, int $p_m){
        parent::construct();
        $this->nom_menus = $n_m;
        $this->image_menus = $i_m;
        $this->prix_menus = $pr_m;
        $this->description_menus = $d_m;
        $this->best_seller = $b_s;
        $this->points_menus = $p_m;
       }
    function create_menus(){
        $resultM = $this->prepare("INSERT INTO menus(nom_menus, image_menus, prix_menus, description_menus, best_seller, points_menus) VALUES(:nom_menus, :image_menus, :prix_menus, :description_menus, :best_seller, :points_menus)");
        $resultM->bindParam(":nom_menus", $this->nom_menus);
        $resultM->bindParam(":image_menus", $this->image_menus);
        $resultM->bindParam(":prix_menus", $this->prix_menus);
        $resultM->bindParam(":description_menus", $this->description_menus);
        $resultM->bindParam(":best_seller", $this->best_seller);
        $resultM->bindParam(":points_menus", $this->points_menus);
        $resultM->execute();
        // echo $this->nom_menus;
    }
    }

$first = new menus("fromage", "img/", 800, "fromage", 1, 5);
$first->create_menus();

   
?>