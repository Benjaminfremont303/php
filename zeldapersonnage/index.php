<?php require 'fonction.php'?>
<?php require 'header.php'?>
<?php require 'variable.php'?>  
<div class="titre">
        <h1>Êtes-vous pluôt gros Kant ou petit Bentham ?</h1>
</div>
<div class="background">
  
    <form action="/index.php" method="GET">
        <label for="question1"><?= $question1 ?></label> <br>
        <?php foreach($reponse1 as $reponses1 => $utilitariste): ?>
        <?= selectionSimple('question1', $reponses1, $_GET) ?> <?= $reponses1 ?> <br>
        <?php endforeach; ?>
        <br>
        <label for="question2"><?= $question2 ?></label> <br>
        <?php foreach($reponse2 as $reponses2 => $utilitariste): ?>
        <?= selectionSimple('question2', $reponses2, $_GET) ?> <?= $reponses2 ?> <br>
        <?php endforeach; ?>
        <label for="question3"><?= $question3 ?></label> <br> 
        <?php foreach($reponse3 as $reponses3 => $utilitariste): ?>
        <?= selectionSimple('question3', $reponses3, $_GET) ?> <?= $reponses3 ?> <br>
        <?php endforeach; ?>
        <input type="submit" name="Valider">
    </form>
</div>