<?php

$table = array();
$count = 0;
$handle = fopen($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Table_zozio.csv", 'r');
while($data = fgetcsv($handle, 1000, ",")) {
    if ($count !== 0)
        array_push($table, $data);
    else
        $count = 1; 
}


foreach($table as $line) {
    $req = $db->prepare("INSERT INTO products (cart, zone_product, type_product, quantity, sav) VALUES (?, ?, ?, ?, ?)");
    try {
        $req->execute($line);
    }
    catch (PDOException $err) {
        echo "L'ajout des elements en base de données a échoué. ".$err->getMessage().'<br/>';
    }
}

?>