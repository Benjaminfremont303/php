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
 * getById
 *
 * @param  mixed $id chercher le produit de l'id correspondant
 * @return void retourne l'id
 */
public static function getById(int $id)
    { 
        $init = new produits;
        $requete = $init->prepare("SELECT * FROM produits where id=:id");
        $requete->bindParam(":id", $id);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC | PDO::FETCH_PROPS_LATE);
        $resultat = $requete->fetch();
        // Si il y a un résultats, on retourne ce résultat
        if (empty($resultat)) {
           return "L'id $id n'existe pas ";
        } else {        
             return $resultat;         
        }
    }
/**
 *getallproduits recupere tous les produits pour les afficher
 * @return void retourner un objet sans nom
 */
public function getAllProduits(){

    $requete = $this->prepare("select * from produits");
    $requete->execute();
    $resultat = $requete->fetchall(PDO::FETCH_OBJ);
    return $resultat;
}
/**
 * getSearch
 *
 * @param  mixed $motEntree mot entré par l'utilisateur
 * @return void la recherche de l'utilisateur
 */
public function getSearch(string $motEntree){
    
        $recherche = new produits;
        $req = $recherche->prepare("select * from produits where nom like '%$motEntree%'");
        $req->execute();
        $resultat = $req->fetchall(PDO::FETCH_OBJ);
        return $resultat;
}
public function panier(array $ids){

    $requete = $this->prepare('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');


    $requete->execute();
    $resultat = $requete->fetchall(PDO::FETCH_OBJ);
    var_dump($requete);
    return $resultat;
}



/**
 * Get getById
 */ 

}


