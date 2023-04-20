<?php
include "config.php";

class user extends DB
{
    private $userID;
    private $name;
    private $surname;
    private $location;
    private $mail;
    private $password;
    private $fidelity;
    function __construct()
    {
        parent::__construct();
    }
    public static function display(){
        $connec = new user();
        $query = $connec->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll();
        var_dump($result);
    }
    public static function register($nameR, $surnameR, $locationR, $mailR, $password_hashR){
        $connec = new user();
        $query = $connec->prepare("SELECT * FROM users WHERE mail=:mail");
    $query->bindParam("mail", $mailR, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "Cette adresse mail existe déjà !";
    }
    else if ($query->rowCount() === 0) {
        $query = $connec->prepare("INSERT INTO users(name, surname, location, mail, password, fidelity) VALUES (:name, :surname, :location, :mail, :password, 0)");
    $query->bindParam("name", $nameR, PDO::PARAM_STR);
    $query->bindParam("surname", $surnameR, PDO::PARAM_STR);
    $query->bindParam("location", $locationR, PDO::PARAM_STR);
    $query->bindParam("mail", $mailR, PDO::PARAM_STR);
    $query->bindParam("password", $password_hashR, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        echo "c bon !";

    }
    else{
        echo " erreur !";
    }
    }
    }
    public static function login($mailL, $passwordL){
        $connec = new user();
        $query = $connec->prepare("SELECT * FROM users WHERE mail=:mail");
        $query->bindParam("mail", $mailL, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_CLASS, "user");
    if (!$result) {
        echo "<p class='txt'>Veuillez vérifier votre mail et votre mot de passe!</p>";
    } else {
        if (password_verify($passwordL, $result['password'])) {
            $_SESSION['user_id'] = $result['userID'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['surname'] = $result['surname'];
            echo "<p class='txt'>Félicitations! Vous êtes connectés!</p>";
        } else {
            echo "<p class='txt'>Veuillez vérifier votre mail et votre mot de passe!</p>";
        }
    }
    }
    public static function delete($mailD){
        $connec = new user();
        $query = $connec->prepare("SELECT * FROM users WHERE mail=:mail");
        $query->bindParam("mail", $mailD, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $query = $connec->prepare("DELETE FROM users WHERE mail=:mail");
            $query->bindParam("mail", $mailD, PDO::PARAM_STR);
            $result = $query->execute();
            echo "$mailD a bien été supprimé !";
        }
        else {
            echo "Cet utilisateur n'existe pas !";
        }
    }
}