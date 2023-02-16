<?php

$tab = [8,1,3,9,8,7,1,4,3,1,2];
$countt= count($tab);


for ($i=0; $i<$countt; $i++){
for ($j=$i+1; $j<$countt; $j++)
    if ($tab[$i] > $tab[$j]){
    [$tab[$i],$tab[$j]] = [$tab[$j],$tab[$i]];
}
}
print_r($tab)


?>