<?php 

$n=49;
 $premier = true;
    for ($i = 2; $i < $n; $i++) {
       
        if ($n % $i == 0) {
             $premier = false;
        }
  
}
if ($premier){
    echo "$n est premier";
}
  





?>