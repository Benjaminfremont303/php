<?php
// On récupère l'objet "base de données"
require_once "db.php";
require_once '../model/Produits_Commandes.php';
require_once '../model/Personnes_Commandes.php';

// Par convention, on met la première lettre d'une classe en majuscule
class Commandes extends DB
{
    protected int $id;
    protected string $paiement;
    protected bool $valide;
    protected string $date;
public function __construct(string $paiement ='', int $valide = 0, string $date = '') 
{
    parent::__construct();
    $this->id = -1;
    $this->paiement = $paiement;
    $this->valide = $valide;
    $this->date = $date;
}

public function getProduits()
{
    $requete = $this->prepare("select produits.* from produits
        inner join commandes_produits on id_produits = produits.id
        where id_commandes=:id");
    $requete->bindParam("id", $this->id, PDO::PARAM_INT);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Produits');
    $requete->execute();
    $result = $requete->fetchAll();
    return $result;
}


public function save(){
    $req = $this->prepare("SELECT *  FROM commandes WHERE id = :id");
    $req->bindParam(":id", $this->id);
    $req->execute();
    $existe = $req->fetchAll(PDO::FETCH_OBJ);

    if(sizeof($existe) > 0){ // sizeof($existe) == sizeof(existe) > 0
        $requete = $this->prepare("UPDATE commandes set paiement =:p, valide=:v, date=:a WHERE id = :id");
    }
    else{
        $requete = $this->prepare("INSERT INTO commandes(paiement, valide, date) VALUES(:p,:v,:d)");
    }   
    $requete->bindParam(":p", $this->paiement);
    $requete->bindParam(":v", $this->valide);
    $requete->bindParam(":d", $this->date);
    $requete->execute();
    $resultat=$this->lastInsertId();

    $lienProduits = new produitscommandes();
    $lienProduits->addCommande($resultat);

    $lienPersonnes = new personnescommandes();
    $lienPersonnes->addCommande($resultat);

}


//or die(print_r($this->errorInfo()));


/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}
}

