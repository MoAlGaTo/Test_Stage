<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Test_Stage/Model/graphic_requests.php');


$data = json_decode(file_get_contents("php://input"), true);

switch ($data['req_info']) {
    case 'type':
        $data_to_return = get_product_quantity($data['product']);
        break;
    case 'sav':
        $data_to_return = get_sav_quantity($data['product']);
        break;
}

echo json_encode(
    array(
        'response' => $data_to_return
    )
);

?>