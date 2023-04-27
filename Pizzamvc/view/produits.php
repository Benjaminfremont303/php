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

</div>
<hr>
    <div class="produit">

    <?php foreach($allprod as $produit):    
        $type = $produit->type;
        $nom  = $produit->nom;
        $prix = $produit->prix;
        $description = $produit->description;
        $points = $produit->points;
    ?>
        <button>ajouter au panier</button>
        <h3><?=$nom;?></h3>
        <p><?= $description?></p>
        <img src="" alt="">
        <p><?=$prix/100 ?> euros</p>
        <p>Gagnez <?=$points?> points </p>


        <?php endforeach ?>
    </div>

<h2>Bienvunue regardez nos <?=$type;?>s extraordinaire</h2>

