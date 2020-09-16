<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Test_Stage/Model/board_requests.php');


$data = json_decode(file_get_contents("php://input"), true);

switch ($data['req_info']) {
    case 'base':
        $data_to_return = get_products($data['sorter']);
        break;
    case 'zone':
        $data_to_return = get_filter_by_zone($data['filter'], $data['sorter']);
        break;
    case 'type':
        $data_to_return = get_filter_by_type($data['filter'], $data['sorter']);
        break;
    case 'quantity':
        $data_to_return = get_filter_by_quantity($data['filter_min'], $data['filter_max'], $data['sorter']);
        break;
    case 'sav':
        $data_to_return = get_filter_by_sav($data['filter'], $data['sorter']);
        break;
}

echo json_encode(
    array(
        'response' => $data_to_return
    )
);

?>