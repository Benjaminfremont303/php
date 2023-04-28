<h2>Bienvunue regardez nos Menus extraordinaires</h2>
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

    <?php foreach($allprod as $Menus):    
        $nom = $Menus->nom;
        $image  = $Menus->image;
        $prix = $Menus->prix;
        $description = $Menus->description;
        $points = $Menus->points;
    ?>
        <button>ajouter au panier</button>
        <h3><?=$nom;?></h3>
        <p><?= $description?></p>
        <img src="" alt="">
        <p><?=$prix/100 ?> euros</p>
        <p>Gagnez <?=$points?> points </p>
    <?php endforeach ?>
    </div>


<?php