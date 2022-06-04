<?php
require_once '../conn.php';

if ($_POST['password'] == "" || $_POST['password2'] == "" || $_POST['pass'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

$result = mysqli_query($connect, "SELECT `password` FROM users WHERE id='" . $_GET['id'] . "'");
if ($_POST['pass'] != mysqli_fetch_assoc($result)['password']) {
        echo json_encode(array("status" => "error", "message" => "Password Lama Salah"));
        return;
}

if ($_POST['password'] != $_POST['password2']) {
        echo json_encode(array("status" => "error", "message" => "Password Baru tidak sama"));
        return;
}

$result = update("users", "`password`='" . $_POST['password'] . "' WHERE id='" . $_GET['id'] . "'");

if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Update Password"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Update Password"));
}
