<?php
//
if( method_exists('groups', 'listAll') ) {
$allGroups = Groups::listAll();
}else{
    echo "Alert un bug dans la matrix est detecté merci de réessayer dans un espace-temps différent";
}
//lister les description selon le theme en renseignent l'auteur
$name = filter_input(INPUT_POST, "groups", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if($name){
    $description = Groups::listGroupByID($name);
}
//lister les utilisateur selon le groupe
if($name){
    $users = Groups::listUserByGroups($name);
}
