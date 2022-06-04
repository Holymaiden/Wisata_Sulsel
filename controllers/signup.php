<?php
require_once 'conn.php';
//login
//mencari data didatabase sesuai post
if ($_POST['password'] == "" || $_POST['username'] == "" || $_POST['password2'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

$result = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $_POST['username'] . "'");
//cek apakah data ditemukan
if (mysqli_num_rows($result) != 1) {
        if ($_POST['password'] != $_POST['password2']) {
                echo json_encode(array("status" => "error", "message" => "Password tidak sama"));
                return;
        }
        //mengambil data dari dari variable result merubah jadi array
        $result = tambah("users", "(username, password) VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "')");
        //cek password
        if ($result) {
                echo json_encode(array("status" => "success", "message" => "Berhasil Registrasi"));
        } else {
                echo json_encode(array("status" => "error", "message" => "Gagal Registrasi"));
        }
} else {
        echo json_encode(array("status" => "error", "message" => "Username Sudah Ada"));
}
