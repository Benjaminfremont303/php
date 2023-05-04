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
    case"style/404.css":
        header("Content-type: text/css");
        require "../view/style/404.css";
        break;
    case "js/script.js":
        header("Content-type: text/javascript");
        require "../view/script.js"; // sous repertoire obligatoire
        break;
    case "style/utilisateur.css":
        header("Content-type: text/css");
        require "../view/style/utilisateur.css"; // sous repertoire obligatoire
        break;
    case "panier.png":
        header("Content-type: image/png");
        require "../view/images/panier.png"; // sous repertoire obligatoire
         break;
    case "formulaireinscription.php": 
        require "inscription.php";
        require "../view/header.php";
        require "../view/formulaireinscription.php";
        break;
    case "connexion.php":
        require "../view/connexion.php";
        break;
    case "formulaireconnexion.php":
        require "formulaireconnexion.php";
        require "../view/formulaireconnexion.php";
        break;
    case "admin.php":
    
        break;
    case"produit.php":        
        require "produits.php";
        require "../view/header.php";
        require "../view/produits.php"; 
        break;
    case"menus.php":
        require '../view/header.php';
        require "../view/menus.php";
        break;
    case"recappanier.php":
        require 'produits.php';
        require 'panier.php';
        require '../view/header.php';
        require "../view/recappanier.php";
        break;
    case "panier.php":
        require 'commande.php';
        require "produits.php";
        require "panier.php";
        require '../view/header.php';
        require "../view/panier.php";
        break;     
    default:
        require "../view/404.html";
}
