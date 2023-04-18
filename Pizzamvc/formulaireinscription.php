<form action="/index.php" method="POST">
    <label for="nom">Nom</label>
        <input  name="nom" type="text">
    <label for="prenom">Prenom</label>
        <input name="prenom" type="text">
    <label for="adresse">adresse</label>
        <input name="adresse" type="text">
    <label for="email">email</label>
         <input name="email"type="email"> 
  
    <label for="email">email confirmation</label>
         <input name="email2"type="email"> 
    <label for="mdp">mot de passe</label>
        <input name="mdp2" type="PASSWORD"> 
   
    <label for="mdp">mot de passe confirmation</label>
        <input name="mdp" type="PASSWORD">  
    <input name="submit" value="envoyer" type="submit">  
</form>
<?php 
var_dump($_POST);
require 'inscription.php';
?>