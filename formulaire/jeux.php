<?php
$aDevine = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_GET['chiffre'])){
    if ($_GET['chiffre'] > $aDevine){
        $erreur = "Votre chiffre est trop grand";
    }elseif($_GET['chiffre'] < $aDevine){
        $erreur = "Votre chiffre est trop petit";
    }else{
       $succes = "Bravo, super tu as devinier le nombre exact <strong> $aDevine <strong>";
    }
    $value = (int)$_GET['chiffre'];
}
?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php elseif ($succes): ?>
    <div class="alert alert-danger">
    <?= $succes ?>
</div>
<?php endif ?>

