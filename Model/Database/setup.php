<?php

require_once('connection.php');

$db = pMyA_connection();


/********************************** creation de la base de donées test_stage **********************************/
$table_drop = "DROP DATABASE IF EXISTS test_stage";
$base = "CREATE DATABASE IF NOT EXISTS test_stage CHARACTER SET 'utf8' COLLATE = utf8_general_ci";
try 
{
    $db->prepare($table_drop)->execute();
    $db->prepare($base)->execute();
}
catch (PDOException $err)
{
    echo "La base de données test_stage n'a pas pu être créée. ".$err->getMessage()."<br/>";
    die();
}




$db = db_connection();

/********************************** creation de la table products **********************************/
$table_drop = "DROP TABLE IF EXISTS products";
$table = "CREATE TABLE IF NOT EXISTS products (
        id_product INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        cart varchar(255) NOT NULL,
        zone_asset varchar(255) NOT NULL,
        type_asset varchar(255) NOT NULL,
        quantity varchar(255) NOT NULL
        )ENGINE=InnoDB";
try 
{
    $db->prepare($table_drop)->execute();
    $db->prepare($table)->execute();
}
catch (PDOException $err)
{
    echo "La table products n'a pas pu être créée. ".$err->getMessage()."<br/>";
    die();
}




header('Location: http://localhost:8080/Test_Stage/index.php');