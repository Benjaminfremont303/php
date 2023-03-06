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

if(isset($_GET['ligne'], $_GET['colonne'])){
    $ligne = $_GET['ligne'];
    $colonne = $_GET['colonne'];
	$casesJouables = 0;



	if($_SESSION['player'] == 0){
		$_SESSION['player'] = 2;
	}
	var_dump($_SESSION['player']);
	
	if($_SESSION['player'] == 2){
		$_SESSION['player'] = 1;
	}
	elseif($_SESSION['player'] == 1){
		$_SESSION['player'] = 2;
	}
	$_SESSION['jeu'][$ligne][$colonne] = $_SESSION['player'];
	


		}



echo '<table>';
for($ligne = 0; $ligne < 3; $ligne++){
	echo '<tr>';
	for($colonne = 0; $colonne < 3; $colonne++){

		if($_SESSION['jeu'][$ligne][$colonne] == 0){
			echo "<td><a href=?ligne=$ligne&colonne=$colonne>[]</a></td>";
			$casesJouables++;
			
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 1){
			echo '<td>X</td>';
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 2){
			echo '<td>O</td>';		
		}
		
		
	}
	echo '</tr>';
}
echo '</table>';

$_SESSION["jeu"] = $_SESSION["jeu"];

if($casesJouables == 0){
	unset($_SESSION['jeu']);
	unset($_SESSION['player']);
	session_destroy();
	echo  '<a href="index.php?ligne=&colonne=">Rejouer</a>';
	// $_SESSION['player'] = 0;
}

var_dump($casesJouables);
var_dump($ligne);
var_dump($colonne);
var_dump($_SESSION);

?>
</body>
</html>

