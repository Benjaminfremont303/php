<?php
class BDD extends PDO
{
    function construct()
    {
        parent::__construct(
            'mysql:host=localhost;dbname=lapizza;charset=utf8',
            'root'
        );
    }
}

