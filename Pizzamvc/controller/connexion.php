<?php

require '../model/personnes.php';
if(isset($_POST['submit'])){
    $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'mdp');

   $objet2= personnes::getByEmail($mail, $pass);

   if(password_verify($pass, $objet2['mot_de_passe'])){
    echo 'vous etes connecté !'; 
    $_SESSION['Id_personnes'] = $objet2['Id_personnes'];
    $_SESSION['nom_personnes'] = $objet2['nom_personnes'];
    $_SESSION['prenom'] = $objet2['prenom'];
    // return $objet2[0];
}elseif(sizeof($_POST) <= 1){
    echo 'Au un des champs est vide';
     return new personnes(); 
}else{
    
    echo 'erreur de la saisie il faut se ressaisir';
    return new personnes();
}
}