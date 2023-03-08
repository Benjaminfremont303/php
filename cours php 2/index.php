<?php 

$tab = [];
var_dump($tab);
$tab["x"] = "bonjour";

var_dump($tab);
$tab[] = "bonjour";

var_dump($tab);
$tab[] = "ciao";

var_dump($tab);
$tab[5] = "salut";
var_dump($tab);

$tab[1] = "au revoir";
var_dump($tab);

$tab["truc"] = 33 ;
$tab[] = "la pizza suivante";
var_dump($tab);

$tab2 = ["nouveau" => "bonjour", "ancien" => "au revoir"];
$result = array_merge_recursive($tab, $tab2);

var_dump($result); 
$tab = $tab + $tab2;
var_dump($tab);

$tab += $tab2;
var_dump($tab); 

$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);




?>


