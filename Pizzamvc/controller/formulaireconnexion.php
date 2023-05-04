<?php
require '../model/personnes.php';
    /**
     * GetPost
     *
     * @var  mixed $mail prendre variable de email post
     * @var  mixed $pass prendre variable de mdp post
     *  place les variable post dans la methode getByemail
     */
        
    if(isset($_POST['submit'])){
           
        $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'mdp');

        $connecte = Personnes::getByEmail($mail,$pass);
        var_dump($connecte);
   }
   else{

   } 
       

  

