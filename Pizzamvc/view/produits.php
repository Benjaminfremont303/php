<form name="rechercheProduits" action="" methode="GET">
    <input type="text" name="entreeRecherche" placerholder="chercher produit">
    <input type="submit" name="valider" value="trouver">
</form>
<div id="resultat">
    <h3>resultat de recherche :</h3>

        <h3><?= $nom?></h3>
        <p><?= $prix?> </p>
        <img src="" alt="">
        <p><?=$description?></p>
        <p><?=$points?></p>
        <?php echo isset($mauvaiseR)?  $mauvaiseR:  "" ?>
</div>
<hr>
    <div class="produit">

    <?php foreach($allprod as $produit):    
        $id = $produit->id;    
        $type = $produit->type;
        $nom  = $produit->nom;
        $prix = $produit->prix;
        $description = $produit->description;
        $points = $produit->points;
    ?>

        <a href="produit.php?id=<?=$id?>">+ Ajouter au panier</a>
        <h3> <?=$nom;?></h3>
        <p><?= $description?></p>
        <img src="" alt="">
        <p><?=$prix/100 ?> euros</p>
        <p>Gagnez <?=$points?> points </p>
        <?php endforeach ?>
    </div>
   <?php $_SESSION['ajouter'] = $_GET['id']; ?>

<h2>Bienvunue regardez nos <?=$type;?>s extraordinaire</h2>

<?php

?>