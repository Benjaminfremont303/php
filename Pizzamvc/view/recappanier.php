<section class="validerPanier">
    <div>
        <h3>Vos informations de livraion</h3>
    </div>
    <div class="produit">
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
        <ul>
            <li><?=$nom?></li>
            <li><?= $prix/100?></li>
            <li><img src="" alt=""></li>
            <li><?=$description?></li>
            <li>la quantité est de: <?= $_SESSION['panier'][$id] ?></li>
            <li><?=$points?></li>
        </ul>
    <a href="panier.php?del=<?=$id?>">supprimer du panier</a>
    <a href="panier.php?id=<?=$id?>">ajouter encore</a>
    <a href="panier.php?rm=<?=$id?>">diminuer la quantité</a>
<?php endforeach ?>
<?php else:?>
    <h2>Votre panier est plein de vide</h2>
<?php endif ?>
</section>
    <div>
<form method="POST" action="http://pizzamvc/produit.php"><!-- http://pizzamvc/ -->
    <fieldset>
        <legend>Moyen de paiement:</legend>

        <div>
            <input type="radio" id="MasterCard" name="paiement" value="MasterCard">
            <label for="MasterCard">MasterCard</label>
        </div>
        <div>
            <input type="radio" id="Paypal" name="paiement" value="Paypal" >
            <label for="Paypal">Paypal</label>
        </div>
        <div>
            <input type="radio" id="Bitcoin" name="paiement" value="Bitcoin">
            <label for="louie">Bitcoin</label>
        </div>
        <button type="submit" name="Vpanier" value="1">Validez le panier et payer</button>
    </fieldset>           
</form>  
    <div>
        <h3>votre total en euros : <?= number_format(produits::totalPanier()/100) ?></h3>
    </div>
   