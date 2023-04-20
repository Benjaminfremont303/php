<?php 
for($i= 0; $i<10; $i++){
    $x =password_hash("xx", PASSWORD_DEFAULT);
    echo $x."<br>";
}