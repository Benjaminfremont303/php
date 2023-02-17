<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // définir le mode exception d'erreur PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   $sql = "INSERT INTO `client` ( `prenom`, `nom`, `genre`)
// VALUES( '$_POST[prenom]','$_POST[nom]','$_POST[genre]')";


$sql ="SELECT * FROM MENUS ";
  // utiliser la fonction exec() car aucun résultat n'est renvoyé
  $requete = $conn->query($sql);
  $user = $requete->fetchall();
  echo $sql;
  echo "Nouveaux enregistrement ajoutés avec sucéés<br> <a href='formulaire.php'>Retour au formulaire</a>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>