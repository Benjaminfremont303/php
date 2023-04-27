<?php
class DB extends PDO
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

function __construct($db_name,$db_user,$db_pass,$db_host)
    {
       $this->db_name=$db_name;
       $this->db_user=$db_name;
       $this->db_pass=$db_pass;
       $this->db_host=$db_host;
    }
private function GetPdo(){

    if($this->pdo === null){
        $pdo = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo =$pdo;
    }
    return $pdo;
}



}

 