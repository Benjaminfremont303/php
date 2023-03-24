<?php 
function demande_creneau( $phrase = "veullez entrer un creneau"){
        echo $phrase. "\n";
    while (true){
        $ouverture = (int)readline("heure de ouverture: ");
            if($ouverture >= 0 && $ouverture <= 23){
                break;
            }
        }

    while(true){
        $fermeture = (int)readline("heure de fermture: ");
        if($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture){
            break;
    }
}
    return [$ouverture, $fermeture];
    
}
$creaneau = demande_creneau();
$creaneau2 = demande_creneau("veuillez entrer votre creneau");
var_dump($creaneau, $creaneau2);

?>