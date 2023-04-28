<?php
class DB extends PDO
{

    public function __construct()
    {
        try {
            $dsn = 'mysql:dbname=pizza;host=localhost';
            $user = 'root';
            $password = '';
            parent::__construct($dsn, $user, $password);
        } catch (Exception $e) {
            // En cas d'erreur, on écrit dans le fichier de log PHP
            error_log("Erreur connexion base de données", 0);
        }
    }
}
