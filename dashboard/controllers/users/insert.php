<?php
require_once("../../../controllers/conn.php");
//login
//mencari data didatabase sesuai post
if ($_POST['password'] == "" || $_POST['username'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

$result = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $_POST['username'] . "'");
//cek apakah data ditemukan
if (mysqli_num_rows($result) != 1) {
        //mengambil data dari dari variable result merubah jadi array
        $result = mysqli_query($connect, "INSERT INTO users VALUES ('','" . $_POST['username'] . "', '" . $_POST['password'] . "','" . $_POST['role'] . "')");
        //cek password
        if ($result) {
                echo json_encode(array("status" => "success", "message" => "Berhasil Tambah User"));
        } else {
                echo json_encode(array("status" => "error", "message" => "Gagal Tambah User"));
        }
} else {
        echo json_encode(array("status" => "error", "message" => "Username Sudah Ada"));
}
