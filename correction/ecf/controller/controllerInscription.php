<?php
if ($_POST['inscription']) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $user = new Users;
    $user->setUsername($username);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->save();
    
}