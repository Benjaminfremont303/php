<?php
class BDD extends PDO
{
    function construct()
    {
        parent::__construct(
            'mysql:host=localhost;dbname=lapizza;charset=utf8',
            'root'
        );
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lapizza";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // définir le mode exception d'erreur PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);