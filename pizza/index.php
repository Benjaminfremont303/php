<!DOCTYPE html>
<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="carrousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <title>Chapeau la pizza</title>
</head>
<body>
    <header>

    <div class="panierSlide">       
      <img class="panier" src="img/panier.png" alt="">
           
      <ul class="boite"></ul>
    </div>
    <div id="intro">
      <h1>Bienvenue sur Chapeau la pizza</h1>
      <img id="logo1" src="img/pizzalogo.png" alt="logo">
      <img id="logo" src="img/logo.gif" alt="">
    </div>
    <div class="choix">
          <figure id="emporter">
              <a href=""><img class="emOuLIv" src="img/emporter.gif"></a>
              <figcaption>À emporter</figcaption>
          </figure>
          <figure id="livraison">
            <a href=""><img class="emOuLIv" src="img/ez.gif"></a>
            <figcaption>Livraison</figcaption>
            </figure>
          <figure id="reserver">
              <a href=""><img class="emOuLIv2" src="img/giphy.gif"></a>
              <figcaption>Réserver</figcaption>
          </figure>
      
    </header>
    <main>
        <h2>Nos Menus :</h2>
     

  
  
      <?php
       $sql = "SELECT * FROM pizza ";
       $requete = $conn->query($sql);
       $pizzas = $requete->fetchall();
        foreach($pizzas as $pizza){
          $nomPizza=$pizza["nom"];
          $id_pizza=$pizza["Id_pizza"];
          $des_pizza=$pizza["description"];
          $prix_pizza=$pizza["prix pizza seul"];

      ?>
      <details class="donnee" id = "<?php echo 'pizza_'; echo $id_pizza ?>" value="<?php echo $nomPizza?>">
            <summary id="carrouseltext"><?php echo $nomPizza; ?> :

              </summary>
              <div id="spe">
                <?php
                  echo "<button onclick='add(\"$nomPizza\",$prix_pizza, $id_pizza)' class ='add'>Click me</button>" ;
                  echo "<img src='img/pizza" .$id_pizza. ".jpg' alt=''>";
                  echo "<p class='descrip'> $des_pizza </p>";
                  echo "<p class='prix'>" .($prix_pizza/100). "euros </p>";
?>
              </div>
            </details>
        <?php } ?>
          
  
  </main>
    <footer>
       <img class="contact" src="img/ticketrestaurant.png" alt="">
       <img class="contact" src="img/cb.jpg" alt="">
    <div id="info">
      <p id="adresse">
        Adresse : Via del Governo Vecchio, 10, 
        00186 Roma RM, Italie
      </p>
       <p id="horaires">
          Horaires : <br>  
          
            lundi	11:30–19:00 <br>
            mardi	11:30–19:00 <br>
            mercredi	11:30–19:00 <br>
            jeudi	11:30–19:00 <br>
            vendredi	11:30–19:00 <br>
            samedi	11:30–19:00 <br>
            dimanche	11:30–19:00   
        </p>
        <p id="telephone"><br>
            Menu: dishcovery.menu
            Téléphone : +39 06 6880 1330
        </p>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.70007677642!2d12.466793615738126!3d41.89930687206529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6044d1aff6fd%3A0xd27a28b797ab6a3b!2sVia%20del%20Governo%20Vecchio%2C%2010%2C%2000186%20Roma%20RM%2C%20Italie!5e0!3m2!1sfr!2sfr!4v1676451863810!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </footer>
</body>
</html>