<form action="VoirPostParTheme" method="post">
    <select  name="themes" class="themes">
    <option>Theme: </option>

        <?php  foreach ($allTheme as $themes): ?>
            
            <option value="<?= $id = $themes->id ?>"><?=$themes->name?></option>


        <?php endforeach ?>
    </select>            
    <input class="themes" type="submit" value="Choisir theme">
</form>
<div class="posts">
   
        <?php  if(isset($posts)): 
        
        foreach ($posts as $themePosts): ?>
                    
            <p class="postTitle"><?= $themePosts->title ?></p>  
            <p class="postContent"><?= $themePosts->content ?></p><br>

        <?php endforeach;
        endif
        ?>
        <form action="" class="manage1">
            <input type="submit" value="supprimer">
        </form>
        <form action="modifierPosts" class="manage2">
            <input type="submit" value="modifier">
        </form>
</div>
