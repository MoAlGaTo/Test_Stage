<?php


// A modifier avant l'execution du script
$user = 'root';
$password = 'mohamedali';
/*----------------------------------------*/



define('USER_DB', $user);
define('PASSWORD_DB', $password);



function pMyA_connection()
{
    $dsn = 'mysql:host=127.0.0.1';
    try {
        $db = new PDO($dsn, USER_DB, PASSWORD_DB, [PDO::MYSQL_ATTR_FOUND_ROWS => TRUE]);
    } catch (PDOException $error) {
        echo ('Erreur de connexion à PHP My Admin...' . $error->getMessage());
    }
    return $db;
}


function db_connection()
{
    $dsn = 'mysql:dbname=test_stage;host=127.0.0.1';
    try {
        $db = new PDO($dsn, USER_DB, PASSWORD_DB, [PDO::MYSQL_ATTR_FOUND_ROWS => TRUE]);
    } catch (PDOException $error) {
        echo ('Erreur de connexion à la base de données test_stage...' . $error->getMessage());
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function test_connection()
{
    $dsn = 'mysql:dbname=test_stage;host=127.0.0.1';
    try {
        $db = new PDO($dsn, USER_DB, PASSWORD_DB);
    } catch (PDOException $error) {
        $db = false;
    }
    return $db;
}


?>