<?php
require '../model/personnes.php';

if(isset($_POST['submit'])){
    $nom =  filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST,'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $adresse = filter_input(INPUT_POST,'adresse'); 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass');

    $personnes = new personnes($nom,$prenom,$adresse,$email,$pass);
    $personnes->save();

}


