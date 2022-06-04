<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT * FROM users WHERE username LIKE '%" . $_GET['cari'] . "%' ORDER BY users.id DESC");
if (count($data) == 0)
        $data = [
                [
                        "id" => "",
                        "username" => "Data tidak ditemukan",
                        "password" => ""
                ]
        ];
echo json_encode(array("total_page" => ceil(count($data) / $_GET['jml']), "total_data" => count($data)));
