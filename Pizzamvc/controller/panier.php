<?php 
/* 
if(!empty($_SESSION['panier'])){  */
if(isset($_SESSION["panier"])) {
        $panier=$_SESSION["panier"];
    }else {
        $panier=Array();
    }
   $id = $_SESSION['id'];
    $produit = produits::getById($id);  
    $quantite = 1;
    $panier[$id] = $quantite;
  
  $_SESSION['panier'] = $produit;
/*      $panier[$id] = $quantite;
 */    var_dump($panier);

 /*    for ($id = 0; $id < 50; $id += 3) {
    $valeur = rand(0, 200); */


    
    /* $panier = [$id=>$quantite];
    array_push($panier,$id); */
  /*  
    $panier = [$id => $quantite]; */
    
/*     $_SESSION['panier'] = array();
    array_push($_SESSION['panier'], $panier);
    var_dump($_SESSION['panier']); */

/*     $nom = $ajouter->nom;
    $prix = $ajouter->prix/100 ."euros";
    $description = $ajouter->description;
    $points = "Gagnez".  $ajouter->points ."points";
    $total; */
/* }else{
       $panierVide = "votre panier est sous l'emprise du grand rien et est possédé par le néant.";
} */

