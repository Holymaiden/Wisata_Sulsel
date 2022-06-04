<?php
require_once '../conn.php';

if ($_POST['comment'] == "" || $_POST['id'] == "" || $_POST['wisata'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

//mengambil data dari dari variable result merubah jadi array
$result = tambah("comments", "('','" . $_POST['comment'] . "', '" . $_POST['wisata'] . "','" . $_POST['id'] . "')");
//cek password
if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Komen"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Komen"));
}
