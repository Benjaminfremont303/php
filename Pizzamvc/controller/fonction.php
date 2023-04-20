<?php
function menus(string $balise):string{
    $balise = "a";
    if($_SERVER['REQUEST_URI'] === $lien){
        $balise = "p";
    }
 return <<<HTML
 
HTML;
}