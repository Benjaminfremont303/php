<?php 
$ajouter = produits::getById($_SESSION['ajouter']);

if(empty($_SESSION['ajouter'])){
    $panierVide = "votre panier est sous l'emprise du grand rien et est possédé par le néant.";
}else{
    $nom = $ajouter->nom;
    $prix = $ajouter->prix/100 ."euros";
    $description = $ajouter->description;
    $points = "Gagnez".  $ajouter->points ."points";
    $total;
}

