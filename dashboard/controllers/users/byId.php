<?php
require_once("../../../controllers/conn.php");
$data = single("SELECT * FROM users WHERE id='" . $_POST['id'] . "'");
//cek apakah data ditemukan
if ($data) {
        //mengambil data dari dari variable data merubah jadi array
        echo json_encode(array("status" => "success", "message" => "User Ditemukan", "data" => $data));
} else {
        echo json_encode(array("status" => "error", "message" => "User Tidak Ditemukan"));
}
