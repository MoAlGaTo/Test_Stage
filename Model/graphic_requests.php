<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Model/Database/connection.php");




function get_product_quantity($product)
{
    $db = db_connection();
    $statement = $db->prepare('SELECT SUM(quantity) FROM products WHERE type_product = :type_product');
    $statement->bindValue(':type_product', $product, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch()[0];
}


function get_sav_quantity($sav)
{
    $db = db_connection();
    $statement = $db->prepare('SELECT sav FROM products where sav = :sav');
    $statement->bindValue(':sav', $sav, PDO::PARAM_INT);
    $statement->execute();
    return $statement->rowCount();
}