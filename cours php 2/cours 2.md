
Tableau
------------------------------------------------------
$tab = [];
$tab["index"] = "bonjour";
$tab[indice] = "bonjour";
$tab[];

fusion:
------
$tab2 = ["nouveau" => "bonjour", "ancien" => "au revoir"];
$tab = $tab + $tab2; // $tab += $tab2;
var_dump($tab);

combine:
-------
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);
Array ( [green] => avocado [red] => apple [yellow] => banana ) 
 
recursive:
---------

$tab2 = ["nouveau" => "bonjour", "ancien" => "au revoir"];
$result = array_merge_recursive($tab, $tab2);

si un indice est vide dans le tableau il le met dedans et pas à la suite


SQL
------------------------------------------------------------------------

SELECT colonne
FROM table
WHERE condition
ORDER BY attribut
GROUP BY attribut
HAVING condition 
LIMIT nombre_de_lignes ;

SELECT * FROM `pizza` WHERE nom LIKE '%Margharita%';

Id_pizza nom description prix pizza seul Menu prix	

1Menu Pizza MargharitaLa pizza Margherita ou napolitaine, est l’une des ...100120

    SQL SELECT
        SQL DISTINCT
        SQL SQL_NO_CACHE
    SQL WHERE
        SQL AND & OR
        SQL IN
        SQL BETWEEN
        SQL LIKE
            SQL Wildcards
        SQL IS NULL / IS NOT NULL
    SQL GROUP BY
        SQL WITH ROLLUP
    SQL HAVING
    SQL ORDER BY
    SQL AS (alias)
    SQL LIMIT
    SQL CASE
    SQL UNION
        SQL UNION ALL
    SQL INTERSECT
    SQL EXCEPT / MINUS
    SQL INSERT INTO
        SQL ON DUPLICATE KEY UPDATE
    SQL UPDATE
    SQL DELETE
    SQL MERGE
    SQL TRUNCATE TABLE
    SQL CREATE DATABASE
    SQL DROP DATABASE
    SQL CREATE TABLE
        SQL PRIMARY KEY
        SQL AUTO_INCREMENT
    SQL ALTER TABLE
    SQL DROP TABLE
    Jointure SQL
        SQL INNER JOIN
        SQL CROSS JOIN
        SQL LEFT JOIN
        SQL RIGHT JOIN
        SQL FULL JOIN
        SQL SELF JOIN
        SQL NATURAL JOIN
    SQL Sous-requête
        SQL EXISTS
        SQL ALL
        SQL ANY / SOME
    Index SQL
        SQL CREATE INDEX
    SQL EXPLAIN
    SQL OPTIMIZE
    Commentaires en SQL
    Exercices SQL

Fonctions SQL

    Fonctions d’agrégation
        SQL AVG()
        SQL COUNT()
        SQL MAX()
        SQL MIN()
        SQL SUM()
    Fonctions de chaînes de caractères
        SQL CONCAT()
        SQL LENGTH()
        SQL REPLACE()
        SQL SOUNDEX()
        SQL SUBSTRING()
        SQL LEFT()
        SQL RIGHT()
        SQL REVERSE()
        SQL TRIM()
        SQL LTRIM()
        SQL RTRIM()
        SQL LPAD()
        SQL UPPER()
        SQL LOWER()
        SQL UCASE()
        SQL LCASE()
        SQL LOCATE()
        SQL INSTR()
    Fonctions mathématiques / numérique
        SQL RAND()
        SQL ROUND()
    Fonctions de dates et d’heures
        SQL DATE_FORMAT()
        SQL DATEDIFF()
        SQL DAYOFWEEK()
        SQL MONTH()
        SQL NOW()
        SQL SEC_TO_TIME()
        SQL TIMEDIFF()
        SQL TIMESTAMP()
        SQL YEAR()
    Fonctions de chiffrements
        SQL MD5()
    SQL CAST()
    SQL CONVERT() (MySQL et SQL Server)
    SQL CONVERT() (PostgreSQL et Oracle)
    SQL ISNULL()
    SQL GROUP_CONCAT()
    SQL VERSION()

les jointures innerjoin
-----------------------
Il doit avoir une table de liaison  entre deux tables

SELECT * FROM `commande` INNER JOIN pizza on commande.id_pizza = pizza.Id_pizza