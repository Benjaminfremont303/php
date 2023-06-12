<!-- lien de creation et de mis à jour -->
<form class="add" action="addGroup">
    <input type="submit" value="ajouter un groupe">
</form>
<!--mis en place du select pour les groupes -->
<form action="groups" method="post">
    <select name="groups" class="groups">
        <option>Les groupes: </option>

        <?php foreach ($allGroups as $groups) : ?>

        <option><?= $groups->name ?></option>

        <?php endforeach ?>
    </select>
    <input class="groups" type="submit" value="Choisir groupes">
</form>

<!-- afficher description -->
<?php if (isset($description)) : ?>
<div class="description">
    <h2>description du groupe :</h2>
    <p><?= $description[0][2]; ?></p>
    <?php endif ?>

    <?php
    if (!empty($users)) : ?>
    <p>les menbres du groupe sont : <?= $users[0]->username ?></p>
    <?php endif ?>
</div>