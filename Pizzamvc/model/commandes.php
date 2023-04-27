<?php
// On récupère l'objet "base de données"
require_once "db.php";
require_once "produits.php";

// Par convention, on met la première lettre d'une classe en majuscule
class Commandes extends DB
{
    protected string $paiement;
    protected bool $valide;
    protected string $date;
    protected int $prix;

    function getProduits()
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

    function getMenus()
    {
        $requete = $this->prepare("select menus.* from menus
            inner join commandes_menus on id_menus = menus.id
            where id_commandes=:id");
        $requete->bindParam("id", $this->id, PDO::PARAM_INT);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Menus');
        $requete->execute();
        $result = $requete->fetchAll();
        return $result;
    }
}
