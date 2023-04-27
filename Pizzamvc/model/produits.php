<?php
// On récupère l'objet "base de données"
require_once "db.php";

// Par convention, on met la première lettre d'une classe en majuscule
/**
 * Produits  differentes varaible correspondant avec notre table
 */
class Produits extends DB
{
    protected int $id;
    protected string $type;
    protected string $nom;
    protected int $prix;
    protected string $description;
    protected int $points;
/**
 * __construct
 *
 * @param  mixed $type le type de produit si c'est 'pizza','boisson','desssert'
 * @param  mixed $nom le nom du produit comme coca
 * @param  mixed $prix le prix en euros
 * @param  mixed $description description, ingredient...
 * @param  mixed $point point de fidelité reçu 
 * @return void pas de retour
 */
public function __construct( int $id = 0, string $type = "", string $nom = "", int $prix = 0, string $description = "", int $points = 0)
    {
        parent::__construct();
        $this->id = $id;
        $this->type = $type;
        $this->nom = $nom;
        $this->prix= $prix;
        $this->description = $description;
        $this->points = $points;
    }
/**
 *getallproduits recupere tous les produits pour les afficher
 * @return void retourner un objet sans nom
 */
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
/**
 * getById
 *
 * @param  mixed $id chercher le produit de l'id correspondant
 * @return void retourne l'id
 */
public function getById(int $id)
    {
        // On créé une requête
        $produits = new Produits();
        $requete = $produits->prepare("SELECT * FROM produits where id=:id");
        // On ajoute le paramètre "id" 
        $requete->bindParam(":id", $id);

        // On exécute la requête
        $requete->execute();

        // On récupère l'ensemble des résultats
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Produits');
        $resultat = $requete->fetch();
        // Si il y a un résultats, on retourne ce résultat
        if ($resultat) {
            return $resultat;
        } else {
            $personnes->setNom("L'id $id n'existe pas ");
            return $personnes;
        }
    }

}
    // public function getId()
    // {
    //     return $this->id;
    // }
    // public function getNom()
    // {
    //     return $this->nom;
    // }
    // public function getType()
    // {
    //     return $this->type;
    // }
    // public function getPrix()
    // {
    //     return $this->prix;
    // }
    // public function getDescription()
    // {
    //     return $this->description;
    // }
    // public function getPoints()
    // {
    //     return $this->points;
    // }


