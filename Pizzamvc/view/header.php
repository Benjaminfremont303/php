
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header_nav.css">
    <link rel="stylesheet" href="style/formulaire.css">
    <link rel="stylesheet" href="style/utilisateur.css">
    <title>Document</title>
    <script defer src="js/script.js"></script>
</head>
<body>
    <header>
  
        <?php 
        function form(string $lien, string $titre, string $class = ''){
         $balise = "a";
           if ($_SERVER['REDIRECT_URL'] == $lien){
                $balise ='p';
            } 
            return <<<HTML
            <li><$balise class="$class" elementNav='$titre' href="$lien">$titre</$balise></li>
            HTML;
        }?>

        <ul class="nav1">
        <?php 
               $user = 'connexion';
               if(isset($_SESSION['nom_personnes'])){
               $user = "Bienvenue:".''. $_SESSION['nom_personnes'];
               }
        ?>
            <?= form('/menus.php','Menus')?>
            <?= form('/produit.php','Produit')?>
            <?= form('/commentaire.php','Commentaire')?>
            <?= form('/panier.php','Panier')?>
            <?= form('/formulaireinscription.php','Inscription', 'co')?><hr> 
            <?= form('/connexion.php',$user,'co');?>
            
    </header>
