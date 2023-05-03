<?php 
require '../model/produits.php';
// condition: si la classe ou la methode sont absentes afficher le message de maintenance
if(class_exists('produits') && method_exists('produits', "getAllproduits")){   
        $produit = new produits();
        $allprod = $produit->getAllproduits();
}
else{
    echo "notre page est en cous d'améliorations, veuillez réessayer plus tard";
    ini_set('display_errors', 'off');
}
// ici le filtre de la barre de recherche produit
//si get existe et valider
if(isset($_GET["entreeRecherche"]) && !empty(trim($_GET["valider"]))){

    $searchkey = htmlentities(filter_input(INPUT_GET, 'entreeRecherche'));
    $newsearch = new produits;
    $trouver = $newsearch->getSearch($searchkey); 
//si l'objet n'est pas vide
    if (sizeof($trouver)>0){

        $nom = $trouver[0]->nom;
        $prix = $trouver[0]->prix/100 ."euros";
        $description = $trouver[0]->description;
        $points = "Gagnez".  $trouver[0]->points ."points";
    }//tu renvois un objet vide
    else{
        $nom = '';
        $prix = '';
        $description = '';
        $points = '';
        $mauvaiseR = "rien n'a été trouvé, essayez 'Anchois'";
    }
//tu renvois des vraiable vide pour les erreurs undefined
}else{
    $nom = '';
    $prix = '';
    $description = '';
    $points = '';
}
// panier partie produit
        //si GET id existe
if (isset($_GET['id'])){

    $_SESSION['id'] = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT); 
    $id = $_SESSION['id'];
    $produit = produits::getById($id); 

if(isset($_SESSION["panier"])) {
        $panier=$_SESSION["panier"];  
    }
else{
        $panier=Array();
    }   
    
$quantite = Produits::addPanier($id);

$panier[$id] = $quantite; 
/* $_SESSION['panier'] = $panier; */
}





     


