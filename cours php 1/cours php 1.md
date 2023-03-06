https://wiki.centrale-marseille.fr/ginfo/formations:devweb_3

Les bases de PHP
--------------------------------------------------
le php communique surtout avec le serveur, BDD...
balise dans HTML <?php ?>
phpinfo(); pour avoir des informations sur le serveur et le modules PHP <!-- <?php phpinfo() ?> -->
apache2 permet de se connecter à PHP
index.php/index.html doit etre la racine du serveur

variable
--------------------------------------------------
variable $var ="texte ou valeur"; echo $var;

condition
-------------------------------------------------
on écrit une condition avec if 
if(condition){
    faire
}else{
    sinon
}

boucle
----------------------------------------------------
une boucle sont plusieurs instructions que se repetent tant que la condition n'est pas remplit

 for($i = 0; $i <= 10; $i++){
            echo "\n $i";}

Formulaire
------------------------------------------------------

On peut recuperer une variable avec $_GET dans une URl ou $_POST en cache, la filtrer avec filter_input
MAis on peut "tricher" il faut donc vérifier aussi à l'arrivée 

le $_POST est stocké dans la trame réseau
$var = (string)filter_input(INPUT_POST , "subject", FILTER_VALIDATE_INT);

<form method = "post">
