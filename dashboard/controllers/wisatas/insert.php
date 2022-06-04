<?php
require_once("../../../controllers/conn.php");
//login
//mencari data didatabase sesuai post
if ($_POST['name'] == "" || $_POST['description'] == "" || $_POST['address'] == "" || $_POST['category'] == "" || $_POST['fee'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}
$category = "";
$day = "";
foreach ($_POST['category'] as $key) {
        $category .= $key . ",";
}
foreach ($_POST['openDay'] as $key) {
        $day .= $key . ",";
}
$category = substr($category, 0, -1);
$day = substr($day, 0, -1);
$slug = slug($_POST['name']);

if ($_POST['openDay'] == "")
        $_POST['openDay'] = null;
//mengambil data dari dari variable result merubah jadi array
$result = tambah("destinations", "('','" . $_POST['name'] . "', '" . $slug . "','" . $_POST['description'] . "','" . $_POST['address'] . "'
        , '" . $category . "', '" . $_POST['openHour'] . "', '" . $_POST['closeHour'] . "', '" . $day . "', " . $_POST['fee'] . ")");
//cek password
if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Tambah Wisata"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Tambah Wisata"));
}
