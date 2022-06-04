<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT * FROM comments WHERE comment LIKE '%" . $_GET['cari'] . "%' ORDER BY comments.id DESC");
if (count($data) == 0)
        $data = [
                [
                        "id" => "",
                        "comments" => "Data tidak ditemukan",
                ]
        ];
echo json_encode(array("total_page" => ceil(count($data) / $_GET['jml']), "total_data" => count($data)));
