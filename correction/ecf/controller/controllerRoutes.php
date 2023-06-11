<?php
session_start();
$url = filter_input(INPUT_GET, "url");

switch ($url) {
    case "":
        require "../views/templates/header.php";
        require "../views/index.php";
        break;
    case "VoirPostParTheme":  
        require "../views/templates/header.php";  
        require '../model/db.php';
        require '../model/posts.php';
        require "../model/themes.php";   
        require "../model/users.php";          
        require "voirPostParTheme.php";
        require '../views/voirPostParTheme.php';
        break;
    case "modifierPosts":   
        require '../model/db.php';
        require '../model/posts.php';
        require "../model/themes.php";    
        require "../model/users.php";          
        require "../views/templates/header.php";
        require "../views/modifierPosts.php";
        require "voirPostParTheme.php";
        break;
    case "groups":         
        require '../model/db.php';
        require "../model/groups.php";    
        require "../model/users.php";         
        require "controllerGroups.php";
        require "../views/templates/header.php";
        require "../views/groups.php";
        break;
    case "addGroup":   
        require '../model/db.php';
        require "../model/groups.php";    
        require "../model/users.php";          
        require "../views/templates/header.php";
        require "../views/addGroup.php";
        require "controllerGroups.php";
        break;
    case "style/header.css":
        header("Content-type: text/css");
        require "../html/style/header.css";
        break;
    case "style/voirPostParTheme.css":
        header("Content-type: text/css");
        require "../html/style/voirPostParTheme.css";
        break;
    case "style/groups.css":
        header("Content-type: text/css");
        require "../html/style/groups.css";
        break;
    default:
        include "../views/404.html";
}
