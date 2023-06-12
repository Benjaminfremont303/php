<form action="groups" method="POST">
    <input name="nameGroup" type="text" placeholder="Nom du groupe">
    <input name="descriptionGroup" type="text" placeholder="description du groupe">

    <fieldset>
        <legend>choisir un groupe à modifier laissez vide pour creer:</legend>
        <div>
            <?php foreach ($allGroups as $groups) : ?>
            <input type="checkbox" value="<?= $groups->id ?>" id="<?= $groups->name ?>" name="id">
            <label for="<?= $groups->name ?>"><?= $groups->name ?></label>

            <?php endforeach ?>
        </div>
    </fieldset>
    <input type="submit" value="creer un groupe">
</form>
<?php var_dump($_POST) ?>