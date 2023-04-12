<?php 
require_once 'function.php';
$parfums = [
    'fraise' => 4,
    'chocolat' => 5,
    'vanille' => 3
];
$cornets = [
    'pot' => 2,
    'cornet' => 3
];
$supplements =[
    'pépites de chocolat' => 1,
    'chantilly' => 0,5
];

$title = "composez votre glace";
$ingredient = [];
$prixTotal = 0;

if (isset($_GET['parfum'])){
    foreach($_GET['parfum'] as $parfum){
        if(isset($parfum[$parfum])){
            dump($parfum);
        }
    }
}
?>
<?php
$aDevine = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_POST['chiffre'])){    
    $value = (int)$_POST['chiffre'];
    if ($value > $aDevine){
        $erreur = "Votre chiffre est trop grand";
    }elseif($value < $aDevine){
        $erreur = "Votre chiffre est trop petit";
    }else{
       $succes = "Bravo, super tu as devinier le nombre exact <strong> $aDevine <strong>";
    }
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

<form action="/index.php" method="GET">
<h2>choissez votre parfum</h2>
<div class="glaceform" >
    <?php foreach($parfums as $parfum => $prix): ?> 
            <?= checkbox('parfum', $parfum, $_GET) ?> <p class="parfum"> <?= $parfum ?> - <?= $prix ?> € </p>
    <?php endforeach; ?>
</div>

<h2>choissez votre cornet</h2>
<div>
    <?php foreach($cornets as $cornet => $prix): ?> 
            <?= radio('cornet', $cornet, $_GET) ?> <p class="cornet"> <?= $cornet ?> - <?= $prix ?> € </p>
    <?php endforeach; ?>
</div>

<h2>choissez vos suppléments</h2>

    <?php foreach($supplements as $supplement => $prix): ?> 
            <?= checkbox('supplement', $supplement, $_GET) ?> <p class="parfum"> <?= $supplement ?> - <?= $prix ?> € </p>
    <?php endforeach; ?>

<button type="submit">Composez une glace</button>
</form>


*/ htmlentities /*