<?php
require '../model/personnes.php';
if(isset($_POST['submit'])){
    $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST, 'mdp');

    $personnes = personnes::getByEmail($mail, $mdp);

 }

