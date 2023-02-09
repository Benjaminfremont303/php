<!-- https://wiki.centrale-marseille.fr/ginfo/formations:devweb_3 -->

<!DOCTYPE html>
    <html>
    <head>
    	<title>Une page</title>
    </head>
    <body>
		<?php
		$x=$_GET=["x"];
		$y=$_GET=["y"];

			for ($i=0; $i<3; $i++){
				echo '<tr>';
				for ($j=0; $j<3; $j++){
					echo '<td>';
				}
			}
			
		?>
    </body>
    </html>

