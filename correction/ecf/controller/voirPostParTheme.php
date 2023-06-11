<?php
//
if( method_exists('Themes', 'listAll') ) {
$allTheme = Themes::listAll();
}else{
    echo "Alert un bug dans la matrix est detecté merci de réessayer dans un espace-temps différent";
}
//
$theme = filter_input(INPUT_POST, "themes", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if($theme && method_exists('Themes', 'listPosts')){
    $posts = Themes::listPosts($theme);
}

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($title){
    

        var_dump($post);

}
