<?php 


     function carre($n){
     return $n*$n;
}



function factorielle($nombre){
    $fact = 1;
    for ($i = 1; $i <= $nombre; $i++) {
    $fact = $fact * $i;

    }
    return $fact;
}


function add ($n) {
   return (($n + 1) * $n) /2;
}
 

echo "le carré est". ' '.carre(5). "\n";

echo "la somme est". ' ' .add(100). "\n";



echo "la factorielle est ". ' ' .factorielle(5);





?>