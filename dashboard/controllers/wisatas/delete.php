<?php
require_once("../../../controllers/conn.php");
//login

$result = hapus("destinations", $_GET['id']);
//cek apakah data ditemukan
if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Hapus Wisata"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Hapus Wisata"));
}
