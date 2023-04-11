<?php require 'header.php'; ?>
<?php require 'jeux.php'; ?>


<form action="/index.php" methode="$_GET">
<input type="number" name="chiffre" placeholder="entre 0 et 1000" value="<?= $value ?>"></input>
<button type="submit"> Tente ta chance</button>
</form>


<?php require 'footer.php'; ?>

</body>
