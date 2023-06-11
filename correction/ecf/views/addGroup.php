<form action="groups" method="POST">
    <input name="nameGroup" type="text" placeholder="Nom du groupe">
    <input name="descriptionGroup" type="text" placeholder="description du groupe">

    <fieldset>
    <legend>choisir utilisateurs:</legend>
    <div>
      <input type="checkbox" id="usersGroup" name="userGroup" checked>
      <label for="usersGroup">utilisateur: <?= $user ?></label>
    </div>
    </fieldset>
    <input type="submit" value="creer un groupe">
</form>