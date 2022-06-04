<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT * FROM destinations WHERE `name` LIKE '%" . $_GET['cari'] . "%' ORDER BY destinations.id DESC");
if (count($data) == 0)
        $data = [
                [
                        "id" => "",
                        "wisatas" => "Data tidak ditemukan"
                ]
        ];
echo json_encode(array("total_page" => ceil(count($data) / $_GET['jml']), "total_data" => count($data)));
