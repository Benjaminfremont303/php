<?php 
 foreach($_SESSION['newPanier'] as $panier):    
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
        <p><?= $prix?> </p>
        <img src="" alt="">
        <p><?=$description?></p>
        <p><?=$points?></p>
        <a href="panier.php?del=<?=$id?>">supprimer du panier</a>
<?php endforeach ?>     

