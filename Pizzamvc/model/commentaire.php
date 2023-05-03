<?php 
require '../model/bdd.php';

class commentaire extends DB{
    
    private string $id;
    private string $etoiles;
    private string $texte;

public function __construct($id , $etoiles, $texte)
{
    parent::__construct();
    $this->id = $id;
    $this->etoiles = $etoiles;
    $this->$texte = $texte;
}

function getComm()
{
    $requete = $this->prepare("select commentaire.* from produits
        inner join commandes_produits on id_commande = produits.id
        where id_commandes=:id");
    $requete->bindParam("id", $this->id, PDO::PARAM_INT);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Produits');
    $requete->execute();
    $result = $requete->fetchAll();

    return $result;
}
    }