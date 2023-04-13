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
    'chantilly' => 0.5
];

$title = "composez votre glace";
$ingredients = [];
$total = 0;

foreach(['parfum', 'supplement', 'cornet'] as $glace){
    if (isset($_GET[$glace])){
        $liste = $glace . 's';
        $choix = $_GET[$glace];
        if (is_array($choix)){

            if (is_array($_GET[$glace]))
        foreach($choix as $value){
            if(isset($$liste[$value])){
                $ingredients[] = $value;
                $total += $$liste[$value];   
                    }
                }
        } else {
            if (isset($$liste[$value])){
                 $cornet = $_GET[$value];
           
                $ingredients[] = $value;
                 $total += $$liste[$value];
            }
        }
    }
}

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

<ul>
    <h2>Ici votre glace ultime au prix ultime dans un monde ultime</h2>
    <?php foreach($ingredients as $ingredient): ?>  
        
    <li>
    <?php echo $ingredient; ?></li>
    <?php endforeach; ?>
    <p> <strong>Prix: </strong> <?= $total ?></p>
</ul>


*/ htmlentities /*