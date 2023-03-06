<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
SESSION_start();
if (!isset($_SESSION['jeu'])){
	$_SESSION['jeu'] = [ 
		[0, 0, 0],
		[0, 0, 0],
		[0, 0, 0] ];
	$_SESSION['player'] = 0;
}else{
	$_SESSION['jeu'];
	
}
function finpartie(){
	for($i = 0;$i<=2;$i++){
			for($j = 0 ;$j<=2;$j++){
				if ($_SESSION['jeu'][$i][$j] == 0){
					$ligne = $i;
					$colonne = $j;
					$_SESSION['jeu'][$ligne][$colonne] = 3;
							
					}
					  		}
		}					
	}

if(isset($_GET['ligne'], $_GET['colonne'])){
    $ligne = $_GET['ligne'];
    $colonne = $_GET['colonne'];
	$casesJouables = 0;



	if($_SESSION['player'] == 0){
		$_SESSION['player'] = rand(0,2);
	}
	var_dump($_SESSION['player']);


	if($_SESSION['player'] == 2){
	for($i = rand(0,2);$i<=2;$i++){
			for($j = rand(0,2) ;$j<=2;$j++){
				if ($_SESSION['jeu'][$i][$j] == 0){
					$ligne = $i;
					$colonne = $j;
					goto a;
	  }
	}					
	}

	}		

	if($_SESSION['player'] == 1){
		a:			
	$_SESSION['jeu'][$ligne][$colonne] = $_SESSION['player'];
	
	}
}
$jeu = $_SESSION['jeu'];

for($joueurGain=1; $joueurGain<=2; $joueurGain++) {
	for($i=0; $i<3; $i++) {
		if($jeu[$i][0]==$joueurGain && $jeu[$i][1]==$joueurGain && $jeu[$i][2]){
			finpartie();
		}if($jeu[0][$i]==$joueurGain && $jeu[1][$i]==$joueurGain && $jeu[2][$i]){
		finpartie();
	}   
	}
	if($jeu[0][0]==$joueurGain && $jeu[1][1]==$joueurGain && $jeu[2][2]){ 
	finpartie();
}
	if($jeu[0][2]==$joueurGain && $jeu[1][1]==$joueurGain && $jeu[2][0]){ 
	finpartie();
}
}

echo '<table>';
for($ligne = 0; $ligne < 3; $ligne++){
	echo '<tr>';
	for($colonne = 0; $colonne < 3; $colonne++){

		if($_SESSION['jeu'][$ligne][$colonne] == 0){
			echo "<td><a href=?ligne=$ligne&colonne=$colonne>_</a></td>";
			$casesJouables++;
			
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 1){
			echo '<td>X</td>';
			
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 2){
			echo '<td>O</td>';		
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 3){
			echo '<td></td>';		
		}
		
	}
	echo '</tr>';
}
echo '</table>';


if($casesJouables == 0){
	if (isset($_SESSION['player'])){
		if ($_SESSION['player'] == 1){
			echo "tu gagne";
	   }elseif ($_SESSION['player'] == 2){
		   echo "Pixel Perfect";
	   }}
	unset($_SESSION['jeu']);
	unset($_SESSION['player']);
	session_destroy();
	echo  '<a href="index.php?ligne=&colonne=">Rejouer</a>';
}
var_dump($casesJouables);
var_dump($ligne);
var_dump($colonne);
var_dump($_SESSION);

if (isset($_SESSION["jeu"])){

	$_SESSION["jeu"] = $_SESSION["jeu"];
}

if (isset($_SESSION['player'])){
 if ($_SESSION['player'] == 1){
	$_SESSION['player'] = 2;

}elseif ($_SESSION['player'] == 2){
	
	$_SESSION['player'] = 1;
}
}
?>
</body>
</html>

