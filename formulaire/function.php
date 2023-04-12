<?php
function dump ($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}
?>

<?php 
if (!function_exists('nav_item')){
    function nav_item  (string $lien, string $titre, $linkClass): string{
    $balise ='a';
    if ($_SERVER['SCRIPT_NAME'] === $lien){
        $balise ='p'; 
        // .= pour concat
    };
    return <<<HTML
<ul class=$linkClass>
    <li><$balise href="$lien">$titre</$balise></li>
</ul>    
HTML;
    };
};

function nav_menu (string $linkClass = ''): string{
    return
    nav_item('/index.php', 'Accueil', $linkClass) .
    nav_item('/contact.php', 'Contact', $linkClass);

};
?><?php ?>
<?php 
function checkbox(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])){
            $attributes .= 'checked'; 
    }
    return <<<HTML
      <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
HTML;
}
function radio(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]){
            $attributes .= 'checked'; 
    }
    return <<<HTML
      <input type="radio" name="{$name}" value="$value" $attributes> 
HTML;
}
?>
