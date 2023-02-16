<?php

$joueur = readline("choisir 'pierre', 'feuille', ou 'ciseaux'");
$ram = rand(0,2);
$choix=["pierre","feuille","ciseaux"];
$comp = $choix[$ram];


if (($joueur == "pierre" && $comp == $choix[0]) || ($joueur == "feuille" && $comp == $choix[1]) || ($joueur == "ciseaux" && $comp == $choix[2])){
    echo "egalité";
}

if (($joueur == "pierre" && $comp == $choix[2]) || ($joueur == "feuille" && $comp == $choix[0]) || ($joueur == "ciseaux" && $comp == $choix[1])){
    echo "je gagne";
}

if (($joueur == "pierre" && $comp == $choix[1]) || ($joueur == "feuille" && $comp == $choix[2]) || ($joueur == "ciseaux" && $comp == $choix[0])){
    echo "l'ordi gagne";
}



var_dump($comp);

?>