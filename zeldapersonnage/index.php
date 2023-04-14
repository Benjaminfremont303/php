<?php require 'fonction.php'?>
<?php require 'header.php'?>
<?php require 'variable.php'?>

<h1>Êtes-vous pluôt gros Kant ou petit Bentham ?</h1>

<form action="/index.php" method="GET">
<label for="question1"><?= $question1 ?></label> <br>
<?php foreach($reponse1 as $reponses1 => $utilitariste): ?>
<?= selectionMulti('question1', $reponses1, $_GET) ?> <?= $reponses1 ?> <br>
<?php endforeach; ?>
<input type="submit" name="Valider">
</form>
