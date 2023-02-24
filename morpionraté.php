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
$casesJouables = 0;
$_SESSION['player'] = 0; // Tour du joueur 1 ou 2
$jeu = $_SESSION['jeu'] = [ // Valeur 0 pour pas joué, 1 -> joueur 1 et 2 -> joueur 2
	[0, 0, 0],
	[0, 0, 0],
	[0, 0, 0] ];

$ligne=(int)filter_input($_GET["ligne"], FILTER_VALIDATE_INT);
$colonne=(int)filter_input($_GET["colonne"], FILTER_VALIDATE_INT);


$_SESSION['jeu'][$ligne][$colonne] = $_SESSION['player'];
$_SESSION['player'] = ($_SESSION['player'] == 1) ? 2 : 1;

if(isset($_GET['ligne'], $_GET['colonne'])){
    $ligne = $_GET['ligne'];
    $colonne = $_GET['colonne'];

 
		$_SESSION['jeu'][$ligne][$colonne] = $_SESSION['player'];
		$_SESSION['player'] = ($_SESSION['player'] == 1) ? 2 : 1;

}
echo '<table>';
for($ligne = 0; $ligne < 3; $ligne++){
	echo '<tr>';
	for($colonne = 0; $colonne < 3; $colonne++){
		if($_SESSION['jeu'][$ligne][$colonne] == 0){
			echo '<td><a href="?ligne='.$ligne.'&colonne='.$colonne.'">[]</a></td>';
			$casesJouables++;
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 1){
			echo '<td>X</td>';
			$_SESSION['jeu'];
		}elseif($_SESSION['jeu'][$ligne][$colonne] == 2){
			echo '<td>O</td>';
			$_SESSION['jeu'];
	}}
	echo '</tr>';
}
echo '</table>';
$jeu = $_SESSION["jeu"];

if($casesJouables == 0){
	$_SESSION['jeu'] = array();
}
$_SESSION['player'] = 0; // Tour du joueur 1 ou 2
$_SESSION['jeu'];

var_dump($casesJouables);
var_dump($ligne);
var_dump($colonne);
var_dump($_SESSION);



?>


</body>
</html>

