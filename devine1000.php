
<?php
session_start();
$formulaire = 1;
$joueur = (int)($_GET["joueur"]);
if ( isset( $_GET['envoyer'] ) ) {
    $joueur = $_GET['joueur'];
} 

			if (!isset($_SESSION['alea'])){
				$_SESSION['alea'] = mt_rand(1, 1000);
				$_SESSION['tour'] = 0;
				$aleatoire = $_SESSION['alea'];		
			}else{
				$tour = $_SESSION['tour'];
				$tour++;
				$_SESSION['tour'] = $tour;
				$aleatoire = $_SESSION['alea'];				
				$saisie = (int)$joueur;

				if($tour === 10){
					echo "votre compte est pas bon";
					$formulaire = 0;
					unset($_SESSION['essais']);
					unset($_SESSION['nombre']);
					unset($_SESSION['max']);
					unset($_SESSION['min']);
					session_destroy();
					echo  '<a href="index.php">Rejouer</a>';
				}
		
				if ($saisie === $aleatoire){
					echo "vous avez gagné \n";
					$formulaire = 0;
					unset($_SESSION['essais']);
					unset($_SESSION['nombre']);
					unset($_SESSION['max']);
					unset($_SESSION['min']);
					session_destroy();
					echo '<a href="index.php">Rejouer</a>';
				}elseif ($saisie < $aleatoire){
					echo "Plus haut \n";
				}elseif($saisie > $aleatoire){
					echo "plus bas \n";
				}
			
			}
				if ($formulaire == 1){

				echo '<h4>Devinez le nombre entre 1 et 1000 en 10 essais:</h4>';
				echo '<form>';
				echo '<input type="number" name="joueur" placeholder="entre 1 et 1000"></input>';
				echo '<input class="bouton2" type="submit" value="Je dirai.." name="envoyer">';
				echo '</form>';
				}

		?>
   


