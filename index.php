<?php

require_once('Model/Database/connection.php');

$db = test_connection();

if (!$db) {
    require('View/invite_create_db.php');
} else {
    	echo 'ouai c bon';
}

?>