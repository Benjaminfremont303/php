<form class="add" action="addGroup">
    <input type="submit" value="ajouter un groupe">
</form>

<form action="groups" method="post">
    <select  name="groups" class="groups">
    <option>Les groupes: </option>

        <?php  foreach ($allGroups as $groups): ?>
            
            <option><?=$groups->name?></option>

        <?php endforeach ?>
    </select>            
    <input class="groups" type="submit" value="Choisir groupes">
</form>
<?php 
if($description): ?>
<div class="description">
    <h2 >description du groupe :</h2>
    <p><?= $description[0][1]; ?></p>
    <p>les menbres du groupe sont : <?= $users[0]->username ?></p>
</div>
<?php endif ?>

