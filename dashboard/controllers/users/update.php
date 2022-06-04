<?php
require_once("../../../controllers/conn.php");
//login
//mencari data didatabase sesuai post
if ($_POST['username'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

$result = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $_POST['username'] . "'");
//cek apakah data ditemukan
if (mysqli_num_rows($result) <= 1) {
        $_POST['password'] = md5($_POST['password']);
        //mengambil data dari dari variable result merubah jadi array
        $result = update("users", "username='" . $_POST['username'] . "', role='" . $_POST['role'] . "' WHERE id='" . $_GET['id'] . "'");
        //cek password
        if ($result) {
                echo json_encode(array("status" => "success", "message" => "Berhasil Update User"));
        } else {
                echo json_encode(array("status" => "error", "message" => "Gagal Update User"));
        }
} else {
        echo json_encode(array("status" => "error", "message" => "Username Sudah Ada", "data" => mysqli_num_rows($result)));
}
