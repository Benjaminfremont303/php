
<form>
<select name="joueur">
    <option value="">Prendre une arme :</option>
<option name="joueur" valeur="Ciseaux">ciseaux</option>
<option name="joueur" valeur="Feuille">feuille</option>
<option name="joueur" valeur="Pierre">pierre</option>
</select>

<!-- <textarea name="subject" placeholder="me laisser un message et vos coordonnées"></textarea>'; -->
<input class="bouton2" type="submit" value="ATTAQUER!" name="envoyer">
</form>



<?php
SESSION_start();

$joueur = (string)($_GET["joueur"]);

if ( isset( $_GET['envoyer'] ) ) {
    $joueur = $_GET['joueur'];
} 

$ram = rand(0,2);
$choix=["Pierre","Feuille","Ciseaux"];
$comp = $choix[$ram];


if (($joueur == "pierre" && $comp == $choix[0]) || ($joueur == "feuille" && $comp == $choix[1]) || ($joueur == "ciseaux" && $comp == $choix[2])){
    echo "Aujourd'hui pas de vainqueur mais la prochaine fois je t'aurai, égalité.";
}

if (($joueur == "pierre" && $comp == $choix[2]) || ($joueur == "feuille" && $comp == $choix[0]) || ($joueur == "ciseaux" && $comp == $choix[1])){
    echo "La chance t'a permit de m'arracher la victore de peu, tu gagnes. ";
}

if (($joueur == "pierre" && $comp == $choix[1]) || ($joueur == "feuille" && $comp == $choix[2]) || ($joueur == "ciseaux" && $comp == $choix[0])){
    echo "Ma force et mes convictions ton écrasés tu n'avais pas la moindre chance, tu perds!";
}
if (($joueur == "" && $comp == $choix[1]) || ($joueur == "" && $comp == $choix[2]) || ($joueur == "" && $comp == $choix[0])){
    echo "Celui qui ne choisit pas, le choix sera prie pour lui, je gagne! tu n'as pas choisis d'arme";
}

echo "<br><br>Pixel Perfect avait choisi \"$comp\" comme arme ultime et \"$joueur\" était ton choix"


?>