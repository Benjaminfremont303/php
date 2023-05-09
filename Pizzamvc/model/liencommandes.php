<?php
require '../model/commandes.php';
require '../model/personnes.php';
class liencommandes extends commandes{

    protected int $id;
    protected int $id_produits;
    protected int $id_commandes;
    protected int $quantite;

public function __construct(int $id_produits = 0, int $id_commandes = 0, int $quantite = 0)
{ 
    parent::__construct();
    $this->id = -1;
    $this->id_produits = $id_produits;
    $this->id_commandes = $id_commandes;
    $this->date = $quantite;
}

protected function addCommande(int $idc){

if(!empty($_SESSION['panier'])){
    $req = $this->prepare("SELECT *  FROM commandes_produits WHERE id = :id");
    $req->bindParam(":id", $this->id);
    $req->execute();
    $existeProduit = $req->fetchAll(PDO::FETCH_OBJ);
    $idp = array_keys($_SESSION['panier']);

    if(!empty($existeProduit)){
    
        foreach ($idp as $id){    
            $quantite = $_SESSION['panier'][$id];
            $requete = $this->prepare("UPDATE commandes_produits set id_produits = ?, id_commandes = ?, quantite = ? WHERE id = ?");
            $param = array($id,$idc,$quantite,$this->id);
            $requete->execute($param);
        }
    }else{
    
        foreach ($idp as $id){    
            $quantite = $_SESSION['panier'][$id];
            $requete = $this->prepare("INSERT INTO commandes_produits(id_produits, id_commandes, quantite) VALUES(?,?,?)");     
            $param = array($id,$idc,$quantite);
            $requete->execute($param);
                }
            } 
        }
        

if(!empty($_SESSION['email'])){
    $req = $this->prepare("SELECT *  FROM commandes_produits WHERE id = :id");
    $req->bindParam(":id", $this->id);
    $req->execute();
    $existeUser= $req->fetchAll(PDO::FETCH_OBJ);

    $idpersonnes = new personnes;
    $idUser = $idpersonnes->getIdByEmail($_SESSION['email']);

if(!empty($existeUser)){
               var_dump($idUser);
            $requete = $this->prepare("UPDATE personnes_commandes set id_personnes id_commandes WHERE id = ?");
            $param = array($id,$idc,$quantite,$this->id);
            $requete->execute($param);
    }else{           
        
            $requete = $this->prepare("INSERT INTO personnes_commandes(id_personnes, id_commandes) VALUES(?,?)");     
            $param2 = array($idUser,$idc);
            $requete->execute($param2);
    }
}
        unset($_SESSION['panier']);
    }
}