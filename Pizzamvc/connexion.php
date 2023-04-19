<?php

require 'personnes.php';

if(isset($_POST['submit'])){
    $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'mdp');

   $qql= personnes::getByEmail($mail, $pass);

   if (!$qql){
    echo 'n\'est pas ';
   }else{
        echo 'est';
    }

}