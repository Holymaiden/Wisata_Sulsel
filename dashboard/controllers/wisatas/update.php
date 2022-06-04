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
if ($_POST['openDay'] == "")
        $_POST['openDay'] = null;
//mengambil data dari dari variable result merubah jadi array
$result = update("destinations", "`name`='" . $_POST['name'] . "', description='" . $_POST['description'] . "', address='" . $_POST['address'] . "'
        , entry_fee='" . $_POST['fee'] . "', open_hour='" . $_POST['openHour'] . "', close_hour='" . $_POST['closeHour'] . "'
        ,  open_day='" . $day . "', type_id='" . $category . "'
        WHERE id='" . $_GET['id'] . "'");
//cek password
if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Update Wisata"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Update Wisata"));
}
