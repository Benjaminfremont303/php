<?php
// On récupère l'objet "base de données"
require_once "db.php";


// Par convention, on met la première lettre d'une classe en majuscule
class Commandes extends DB
{
    protected int $id;
    protected string $paiement;
    protected bool $valide;
    protected string $date;

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

function addcommande(string $paiement, int $valide, DateTime $date){
    $requete = $this->prepare("INSERT INTO commandes(paiement, valide, date) VALUES(:p,:v,:date)");
    $requete->bindParam(":p", $this->paiement);
    $requete->bindParam(":v", $this->valide);
    $requete->bindParam(":d", $this->date);
    $requete->execute();
}

}
