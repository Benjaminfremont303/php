<?php
//lister les utilisateurs 
if (method_exists('users', 'listAll')) {
    $users = Users::listAll();
}
