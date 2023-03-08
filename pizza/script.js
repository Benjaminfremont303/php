// <?PHP

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "pizza";

// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// $sql ="SELECT * FROM pizza ";
// $requete = $conn->query($sql);
// $pizzas = $requete->fetch();
// $nomPizza=$pizzas["nom"];
// header("Content-type: text/css"); 
  
// ?>

let panier = document.querySelector(".panier");
let panierS = document.querySelector(".panierSlide");
let ajouter = document.querySelector(".add");
let nomPizza = document.querySelector(".carrouseltext");
let prixPizza = document.querySelector(".prix");
let listeArticle = document.querySelector(".listeArticle"); 
let text = document.querySelector(".text");

panier.addEventListener("click", function(){
    panierS.classList.toggle("panierSlideOuvert");
});

ajouter.addEventListener("click", function(){
    text.innerHTML += '<?php echo $nomPizza; ?>';
});
