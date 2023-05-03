<?php 
if (isset($_GET['del'])){
    $del = $_GET['del'];
    unset($_SESSION['panier'][$del]);
}
if (isset($_GET['rm'])){
    $rm = $_GET['rm'];
    $panier=$_SESSION["panier"];  
    $quantite = Produits::rmPanier($rm);
    $panier[$rm] = $quantite; 
 }
if(!empty($_SESSION['panier'])){
$ids = array_keys($_SESSION['panier']);
$p = new produits;
$newPanier = $p->panier($ids);
}