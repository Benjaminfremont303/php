<?php 
require 'header.php';

?>
<form class="inscription" action="formulaireinscription.php" method="POST">
    <label for="nom">Nom</label>
        <input  name="nom" type="text"><br>
    <label for="prenom">Prenom</label>
        <input name="prenom" type="text"><br>
    <label for="adresse">adresse</label>
        <input name="adresse" type="text"><br>
    <label for="email">email</label>
         <input name="email"type="email"> <br>
  
    <label for="email">email confirmation</label>
         <input name="email2"type="email"> <br>
    <label for="mdp">mot de passe</label>
        <input name="mdp2" type="PASSWORD"> <br>
   
    <label for="mdp">mot de passe confirmation</label>
        <input name="mdp" type="PASSWORD">  <br>
    <input name="submit" value="envoyer" type="submit">  
</form>
