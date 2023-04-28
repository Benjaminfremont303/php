<table>
  <!--   <tr>
        <th></th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Action</th>
    </tr> -->
    <h3>Votre panier: </h3>
    <?php echo isset($vide)? $vide: $vide='';?>
        <h3><?= $nom?></h3>
        <p><?= $prix?> </p>
        <img src="" alt="">
        <p><?=$description?></p>
        <p><?=$points?></p>
    <?php 
        $total=0;
        
      
    ?>
</table>