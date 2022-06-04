<?php
require_once '../conn.php';
$destination = many("SELECT destinations.*,images.image FROM destinations LEFT JOIN images ON destinations.id = images.destination_id WHERE destinations.name LIKE '%" . $_GET['cari'] . "%' ORDER BY destinations.id DESC");
echo json_encode(array("total_page" => ceil(count($destination) / $_GET['jml']), "total_data" => count($destination)));
