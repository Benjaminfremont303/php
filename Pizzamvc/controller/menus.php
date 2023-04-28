<?php require '../model/menus.php';

// condition: si la classe ou la methode sont absentes afficher le message de maintenance
if(class_exists('menus') && method_exists('menus', "getAllMenus")){   
     $menus = new menus();
     $allprod = $menus->getAllMenus();
}else{
    echo "notre page est en cous d'améliorations, veuillez réessayer plus tard";
    // ini_set('display_errors', 'off');
}
if(isset($_GET["entreeRecherche"]) && !empty(trim($_GET["valider"]))){
    $searchkey = htmlentities(filter_input(INPUT_GET, 'entreeRecherche'));
    $newsearch = new menus;
    $trouver = $newsearch->getSearch($searchkey); 

    if (sizeof($trouver)>0){

        $nom = $trouver[0]->nom;
        $prix = $trouver[0]->prix/100 ."euros";
        $description = $trouver[0]->description;
        $points = "Gagnez".  $trouver[0]->points ."points";
    }else{
        $nom = '';
        $image = '';
        $prix = '';
        $description = '';
        $points = '';
        $mauvaiseR = "rien n'a été trouvé, essayez 'Menu simple'";
    }
}else{
    $nom = '';
    $prix = '';
    $description = '';
    $points = '';
}