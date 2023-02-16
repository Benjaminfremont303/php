
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tic Tac Toe</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Josefin+Sans:ital,wght@0,400;1,300&family=Open+Sans&family=Tourney:ital@0;1&display=swap" rel="stylesheet">

</head>
<body> 
    <div class = centre>
    <table>
        <?php
            //  Je demarre la session
            session_start();
            //  Les coups joues seront memorises dans le tableau $jeu
            $jeu = array();
            /*  Je recuperes les donnees
                J'utilise le filtre FILTER_VALIDATE_INT afin de limiter les risques, 
                puis je convertis en entier en ajoutant (int) devant.
                LigneJouee et colonneJouee sont la ligne et la colonne 
                de la case ou le joueur a clique.
                Joueur est un nombre 1 ou 2 qui nous indique qui a clique
            */
            
            $icone = array();
            $icone[0] = '<img src="cliquez-ici.png">';
            $icone[1] = '<img src="pomme.png">';
            $icone[2] = '<img src="peche.png">';

            $ligneJouee=(int)filter_input(INPUT_GET,"ligne", FILTER_VALIDATE_INT);
            $colonneJouee=(int)filter_input(INPUT_GET,"colonne", FILTER_VALIDATE_INT);
            $joueur=(int)filter_input(INPUT_GET,"joueur", FILTER_VALIDATE_INT);

            // Qui a gagne ? (restera a zero en cas de match null)
            $aGagne=0;
            // Nombre de cases jouables (restera a zero quand la partie sera terminee)
            $casesJouables=0;

            // Si la session existe deja, je recuperes le tableau jeu dans la session
            if($joueur!=0) {
                $jeu=$_SESSION["jeu"];
                $jeu[$colonneJouee][$ligneJouee]=$joueur;
            }
            // Sinon, je construis le tableau jeu avec des 0 de partout
            // 0 m'indiquera que personne n'a encore clique sur cette case
            else {
                for($ligne=0; $ligne<3;$ligne++)
                    for($colonne=0; $colonne<3; $colonne++)
                        $jeu[$ligne][$colonne]=0;
                $_SESSION["jeu"]=$jeu;
                $joueur=2;
            } 
            // Je parcours les lignes du tableau 
            for ($ligne=0;$ligne<3;$ligne++){
                // J'affiche le debut de ligne HTML
                echo '<tr>';
                // Je parcours les colonnes du tableau existant
                // J'attaque une nouvelle colonne, donc j'initialise le nombre des coups par ligne
                $coupsParColonne[$joueur]=0;
                for($colonne=0;$colonne<3;$colonne++){
                    // Je suis maitenant sur une des cases du tableau
                    // Si personne n'a encore clique sur cette case
                    // j'ai un 0 dans la case, donc on peut de cliquer dessus 

                    $colonne_changee=true;
                    for($joueurGain=1; $joueurGain<=2; $joueurGain++) {
                        // Est ce que l'un des deux a gagne ?
                        for($i=0; $i<3; $i++) {
                            // Sur une colonne
                            if($jeu[$i][0]==$joueurGain && $jeu[$i][1]==$joueurGain && $jeu[$i][2]==$joueurGain)
                                $aGagne=$joueurGain;
                            // sur une ligne
                            if($jeu[0][$i]==$joueurGain && $jeu[1][$i]==$joueurGain && $jeu[2][$i]==$joueurGain)
                                $aGagne=$joueurGain;       
                        }
                        // Sur la premiere diagonale
                        if($jeu[0][0]==$joueurGain && $jeu[1][1]==$joueurGain && $jeu[2][2]==$joueurGain) 
                            $aGagne=$joueurGain;
                        // Sur la deuxieme diagonale
                        if($jeu[0][2]==$joueurGain && $jeu[1][1]==$joueurGain && $jeu[2][0]==$joueurGain) 
                            $aGagne=$joueurGain;
                    }
                    if($jeu[$colonne][$ligne]==0) 
                    {
                        // Si la dernière fois c'est le 1 qui a joue le prochain sera le 2
                        // Sinon ce sera le 1
                        if($joueur==1) {
                            $vaJouer=2;
                        }
                        else {
                            $vaJouer=1;
                        }
                        // J'affiche une cellule HTML qui contient un lien
                        // ce lien transmetra au serveur le numero de ligne et de colonne
                        // de la cellule ou le joueur a clique ainsi que son numero
                        if($aGagne==0) {
                            echo "<td><a href=?colonne=$colonne&ligne=$ligne&joueur=$vaJouer>$icone[0]</a></td>"; 
                            $casesJouables++;
                        }
                        else {  
                            echo "<td></td>";
                        }
                    } 
                    // Sinon, j'affiche le numero du joueur
                    else {
                        // J'affiche une cellule HTML qui contient le numero du joueur
                        $aJoue=$icone[$jeu[$colonne][$ligne]];
                        echo "<td>$aJoue</td>"; 
                    }                        
                }
                // Je fermes la ligne HTML
                echo '</tr>';
            }
            // Je ranges la nouvelle disposition pour le jeu dans la session
            $_SESSION["jeu"]=$jeu;
        ?>
    </table>
<?php 
    if($aGagne) {
        $gagnant=$icone[$aGagne];
        echo "<div class='text'>  $gagnant EST LE WINNER!! </div>"; 
    }else 
    { 
        if($casesJouables==0) {
            echo "Match null";
        }
    }
    if($casesJouables==0) {
        echo "<br><a href=?colonne=0&ligne=0&joueur=0><img  class='reload' src='play.png'></a>";
    }


?>
</div>
</body>
</html>