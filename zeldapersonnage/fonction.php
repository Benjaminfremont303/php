<?php 
function dump($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}
function liste (string $lien, string $titre, string $class ): string{
    $balise = "a";
    if($_SERVER['SERVER_NAME'] === $lien){
        $balise = "<p>";
    }
 return <<<HTML
        <ul>
            <li class="$class"><$balise>$titre<$balise/></li>
        </ul>
HTML;
}

