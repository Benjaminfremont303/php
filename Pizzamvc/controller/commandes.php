<?php
require '../model/commandes.php';
if(isset($_POST['Vpanier'])){
    $paiement =  filter_input(INPUT_POST, 'paiement',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $valide = filter_input(INPUT_POST, 'Vpanier',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    date_default_timezone_set('Europe/Paris');
    $date = time();
    $date = date("Y/m/d H:i:s", $date);

    $commande = new commandes($paiement, $valide, $date);
    $commande->save();
    


}