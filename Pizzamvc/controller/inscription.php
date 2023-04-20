<?php
require "../view/formulaireinscription.php";
require "../controller/connexion.php";
if(isset($_POST['submit'])){
    $nom =  filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST,'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $adresse = filter_input(INPUT_POST,'adresse'); 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $fidelite = filter_input(INPUT_POST, 0);
    $pass = filter_input(INPUT_POST, 'mdp');
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $personnes = new personnes();
    $personnes->setAll($nom,$prenom,$adresse,$email,0,$pass);
    $personnes->save();
}


