
<?php require 'header.php'; ?>
<h1>Composer votre glace puis deviner un nombre ou inversement</h1>
<?php require 'jeux.php'; ?>
<form>
    <form action="/index.php" method="POST">
    <input type="number" name="chiffre" placeholder="entre 0 et 1000" value="<?= $value ?>"></input><br>
    <button type="submit">Tente ta chance</button>
</form>
<?php require 'footer.php'; ?>

</body>
