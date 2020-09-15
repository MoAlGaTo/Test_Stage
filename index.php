<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Model/Database/connection.php");

$db = test_connection();

if (!$db) {
    require($_SERVER['DOCUMENT_ROOT']."/Test_Stage/View/invite_create_db.php");
} else {
    require($_SERVER['DOCUMENT_ROOT']."/Test_Stage/View/dashboard.php");
}

?>