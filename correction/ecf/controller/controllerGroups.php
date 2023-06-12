<?php
//lister les groupes
if (method_exists('groups', 'listAll')) {
    $allGroups = Groups::listAll();
} else {
    echo "Alert un bug dans la matrix est detecté merci de réessayer dans un espace-temps différent";
}
//lister les description selon le theme en renseignent l'auteur
$name = filter_input(INPUT_POST, "groups", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($name) {
    $description = Groups::listGroupByName($name);
}
//lister les utilisateur selon le groupe
if ($name) {
    $users = Groups::listUserByGroups($name);
}
//creer un groupe ou update
$nameGroup = filter_input(INPUT_POST, "nameGroup", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($nameGroup) {
    $descripGroup = filter_input(INPUT_POST, "descriptionGroup", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (isset($id)) {
        $newGroup = Groups::listGroupById($id);
    }
    $newGroup = new Groups;
    $newGroup->setName($nameGroup);
    $newGroup->setDescription($descripGroup);
    $newGroup->save();
}
