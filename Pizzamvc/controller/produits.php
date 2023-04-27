<?php 
    require '../model/produits.php';
// condition: si la classe ou la methode sont absentes afficher le message de maintenance
    if( class_exists('produits') && method_exists('produits', "getAllproduits")){   
         $produit = new produits();
         $allprod = $produit->getAllproduits();
    }
    else{
        echo "notre page est en cous d'améliorations, veuillez réessayer plus tard";
        ini_set('display_errors', 'off');
    }
// ici le filtre de la barre de recherche produit

if(isset($_GET["entreeRecherche"]) && !empty(trim($_GET["valider"]))){
    $searchkey = htmlentities(filter_input(INPUT_GET, 'entreeRecherche'));
    $newsearch = new produits;
    $trouver = $newsearch->getSearch($searchkey); 

    $nom = $trouver[0]->nom;
    $prix = $trouver[0]->prix/100 ."euros";
    $description = $trouver[0]->description;
    $points = "Gagnez".  $trouver[0]->points ."points";
}
else{
    $nom = '';
    $prix = '';
    $description = '';
    $points = '';
}
    ?>



     


