<?php
require_once("../../../controllers/conn.php");
$data = single("SELECT * FROM destinations WHERE id='" . $_POST['id'] . "'");
$type = many("SELECT `id` FROM types where id IN (" . $data['type_id'] . ")");
$type = array_column($type, 'id');
$day = explode(',', $data['open_day']);
//cek apakah data ditemukan
if ($data) {
        //mengambil data dari dari variable data merubah jadi array
        echo json_encode(array("status" => "success", "message" => "Wisata Ditemukan", "data" => $data, "type" => $type, "day" => $day));
} else {
        echo json_encode(array("status" => "error", "message" => "Wisata Tidak Ditemukan"));
}
