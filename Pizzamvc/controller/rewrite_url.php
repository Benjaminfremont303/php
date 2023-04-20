<?php 
$url = filter_input(INPUT_GET, "url");
session_start();

switch ($url){
    case"":
        require "../view/index.php";
        break;
    case "style/header_nav.css":
        header("Content-type: text/css");
        require "../view/style/header_nav.css";
        break;
    case "style/formulaire.css":
        header("Content-type: text/css");
        require "../view/style/formulaire.css";
        break;
    case "js/script.js":
        header("Content-type: text/js");
        require "../view/script.js"; // sous repertoire obligatoire
        break;
    case "formulaireinscription.php":
        require "inscription.php";

        break;
    case"admin.php":
        require "../view/admin.php";
            break;    
    default:
        require "../view/404.html";
}
