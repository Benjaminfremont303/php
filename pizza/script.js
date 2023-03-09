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
let donnee = document.getElementsByClassName("donnee");

// let nomPizza = document.querySelector("#carrouseltext").innerHTML;
// let prixPizza = document.querySelector(".prix").innerHTML;
let boite = document.querySelector(".boite");
let num = 1;

let tabPanier=Array();

for (i in donnee) {
    console.log(donnee[i]);
    let t = donnee[i];
    console.log(t.id);
    tabPanier.push(t.id);
  }

console.log(tabPanier);


panier.addEventListener("click", function(){
    panierS.classList.toggle("panierSlideOuvert");
    boite.classList.toggle("boiteappear");

});


function add(nomPizza, prixPizza, id){


 if (true){
    boite.innerHTML +=`<li> ${nomPizza}  ${prixPizza/100} ${id}  ${num}</li>`     
       num++;

};




