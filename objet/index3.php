<?php 

class DB extends PDO{
    public function __construct(){

        $db = "world";
        $host = "localhost";
        $username = "root";
        $mdp = "";
        parent::__construct("mysql:host=$host;dbname=$db", $username, $mdp);
 
    }    

function listeentreprise(){
      
        // $connect = new PDO ()  
        $state = $this -> prepare('select * from entreprise');
        $state -> execute();
        $entreprise = $state -> fetchAll();
        return $entreprise;
    }
}
    //$db = new db();

$entreprise = new db();
var_dump($entreprise->listeentreprise());

?>
