
<?php 
function dump($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

function liste (string $lien, string $titre, string $class = 'nav' ): string{
    $balise = "a";
    if($_SERVER['SERVER_NAME'] === $lien){
        $balise = "<p>";
    }
 return <<<HTML
            <li class="$class"><$balise href="$lien">$titre</$balise></li> 
HTML;
}

function selectionMulti(string $titre, string $value, array $data): string{
    $attritues = '';
if(isset($data[$titre]) && in_array($value, $data[$titre]))  {
    $attritues .= 'checked';
} 
return <<<HTML

    <input class="$titre" type="checkbox" name="{$titre}[]" value="$value" $attritues>
HTML;
}

function selection(string $titre, string $value, array $data): string{
    $attritues = '';
if(isset($data[$titre]) && $value === $data[$titre]){
    $attritues .= 'checked';
}    
    return <<<HTML
    <input type="radio" name="{$titre}[]" $attritues>$titre</input>
HTML;
}

