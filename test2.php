<?php 

function casse($s)
	  {
	   
         if  (preg_match('/^[A-Z]/', $s) == true)

         return 2;
         else
		 return 0;
        }
	  

      echo casse('000');

?>