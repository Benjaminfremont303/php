<?php
require '../model/commandes.php';
if(isset($_POST['Vpanier'])){
    $paiement =  filter_input(INPUT_POST, 'paiement',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $valide = filter_input(INPUT_POST, 'Vpanier',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date("Y-m-d H:i:s"); 
    $date = new DateTime($date);


    $commande = new commandes();
    $commande->addcommande($paiement, $valide, $date);
}

