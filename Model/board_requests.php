<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Model/Database/connection.php");




function get_products($sort_by = false)
{
    $db = db_connection();
    if (!$sort_by || $sort_by === 'base')
        $statement = $db->prepare('SELECT * FROM products');
    else if ($sort_by === 'cart')
        $statement = $db->prepare('SELECT * FROM products ORDER BY length('.$sort_by.'), '.$sort_by);
    else
        $statement = $db->prepare('SELECT * FROM products ORDER BY '.$sort_by);

    $statement->execute();
    return $statement->fetchAll();
}

function get_filter_by_zone($zone, $sort_by)
{
    $db = db_connection();
    if ($sort_by === 'base') {
        $statement = $db->prepare('SELECT * FROM products WHERE zone_product = :zone_product');
    } else if ($sort_by === 'cart') {
        $statement = $db->prepare('SELECT * FROM products WHERE zone_product = :zone_product ORDER BY length('.$sort_by.'), '.$sort_by);
    } else {
        $statement = $db->prepare('SELECT * FROM products WHERE zone_product = :zone_product ORDER BY '.$sort_by);
    }
    $statement->bindValue(':zone_product', $zone, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetchAll();
}


function get_filter_by_type($type, $sort_by)
{
    $db = db_connection();
    if ($sort_by === 'base') {
        $statement = $db->prepare('SELECT * FROM products WHERE type_product = :type_product');
    } else if ($sort_by === 'cart') {
        $statement = $db->prepare('SELECT * FROM products WHERE type_product = :type_product ORDER BY length('.$sort_by.'), '.$sort_by);
    } else {
        $statement = $db->prepare('SELECT * FROM products WHERE type_product = :type_product ORDER BY '.$sort_by);
    }
    $statement->bindValue(':type_product', $type, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetchAll();
}


function get_filter_by_quantity($min_quantity, $max_quantity, $sort_by)
{
    $db = db_connection();
    if ($sort_by === 'base') {
        $statement = $db->prepare('SELECT * FROM products WHERE quantity >= :min_quantity AND quantity <= :max_quantity');
    } else if ($sort_by === 'cart') {
        $statement = $db->prepare('SELECT * FROM products WHERE quantity >= :min_quantity AND quantity <= :max_quantity ORDER BY length('.$sort_by.'), '.$sort_by);
    } else {
        $statement = $db->prepare('SELECT * FROM products WHERE quantity >= :min_quantity AND quantity <= :max_quantity ORDER BY '.$sort_by);
    }
    $statement->bindValue(':min_quantity', $min_quantity, PDO::PARAM_INT);
    $statement->bindValue(':max_quantity', $max_quantity, PDO::PARAM_INT);

    $statement->execute();
    return $statement->fetchAll();
}


function get_filter_by_sav($sav, $sort_by)
{
    $db = db_connection();
    if ($sort_by === 'base') {
        $statement = $db->prepare('SELECT * FROM products WHERE sav = :sav');
    } else if ($sort_by === 'cart') {
        $statement = $db->prepare('SELECT * FROM products WHERE sav = :sav ORDER BY length('.$sort_by.'), '.$sort_by);
    } else {
        $statement = $db->prepare('SELECT * FROM products WHERE sav = :sav ORDER BY '.$sort_by);
    }
    $statement->bindValue(':sav', $sav, PDO::PARAM_STR);
    
    $statement->execute();
    return $statement->fetchAll();
}
