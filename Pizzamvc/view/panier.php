<?php 
if(!empty($_SESSION['panier'])):
    foreach($newPanier as $panier):    
    $id = $panier->id;
    $type = $panier->type;
    $nom  = $panier->nom;
    $prix = $panier->prix;
    $description = $panier->description;
    $points = $panier->points;
?>
    <h3>Votre panier:</h3>
<?php echo isset($panierVide)? $panierVide: $panierVide='';?>
    <h3><?=$nom?></h3>
    <p><?= $prix/100?> </p>
    <img src="" alt="">
    <p><?=$description?></p>
    <p><?=$points?></p>
    <p>la quantité est de: <?= $_SESSION['panier'][$id] ?></p>
    <a href="panier.php?del=<?=$id?>">supprimer du panier</a>
    <a href="panier.php?id=<?=$id?>">ajouter encore</a>
    <a href="panier.php?rm=<?=$id?>">diminuer la quantité</a>
<?php endforeach ?>
<?php else:?>
    <h2>Votre panier est plein de vide</h2>
<?php endif ?>
<p>La totalité du total est: <?= number_format(produits::totalPanier()/100) ?> euros</p>



