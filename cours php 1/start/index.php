<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>start</title>
</head>
<body>

    <?php 
    
         echo "bonjour les amis developpeurs en PHP8!!";
         $var =  "variable";
         echo "<br>";
         echo "\n bonjour \n $var";
         for($i = 0; $i <= 10; $i++){
            echo "\n $i";
         }

         echo "<ul>";
         for($j = 1; $j <= 10; $j++){
                echo "<li> liste $j";
         }

    ?>
    <form method = "post">
                        <h3>Merci d'avoir visité mon portfolio</h3>
                        <p class="question">Seriez-vous prêt à me recruter en tant que stagiaire non rétribué ? </p>
                        <label class="bouton"><input  type="radio" value="oui" name="bouton" />Oui</label>
                        <label class="bouton"><input  type="radio" value="non" name="bouton" />Non désolé</label>

                        <textarea name="subject" placeholder="me laisser un message et vos coordonnées"></textarea>
                        <input type="text" id="name" name="name1" required">
                        <input class="bouton2" type="submit" name='envoyer'> 
    </form>

    <?php
        $var = (string)filter_input(INPUT_POST , "subject");
    //    $var = $_POST['subject'];
        echo $var;
    ?>
</body>
</html>