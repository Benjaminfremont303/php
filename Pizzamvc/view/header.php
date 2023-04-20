
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header_nav.css">
    <link rel="stylesheet" href="style/formulaire.css">
    <title>Document</title>
    <script defer src="js/script.js"></script>
</head>
<body>
    <header>
    <ul class="nav">
        <li><a elementNav="Menus"  href="">Menus</a></li>
        <li><a elementNav="Produit"  href="">Produit</a></li>
        <li><a elementNav="Commentaire"  href="">Commentaire</a></li>        
        <li><a elementNav="Inscription"  href="formulaireinscription.php">Inscription</a></li>       
        <li><a class="connexion" elementNav="Connexion">Connexion</a></li>
        <form class="formulaireCo"action="" method="POST">
            <label for="email">adresse email</label>
                 <input name="email"type="email"> 
            <label for="mdp">mot de passe</label>
                  <input name="mdp" type="text"> 
             <input name="submit" type="submit">
            </form>
    </ul>
    </header>
</html>