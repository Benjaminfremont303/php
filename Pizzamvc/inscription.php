<?php
require 'personnes.php';
if(isset($_POST['submit'])){
    $nom =  htmlentities(filter_input(INPUT_POST, 'nom'));
    $prenom = htmlentities(filter_input(INPUT_POST,'prenom')); 
    $adresse = htmlentities(filter_input(INPUT_POST,'adresse')); 
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $fidelite = filter_input(INPUT_POST, 0);
    $pass = htmlentities(filter_input(INPUT_POST, 'mdp'));
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $personnes = new personnes();
    $personnes->setAll($nom,$prenom,$adresse,$email,0,$pass);
    $personnes->save();
}