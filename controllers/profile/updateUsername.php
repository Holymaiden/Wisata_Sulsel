<?php
require_once '../conn.php';

if ($_POST['username'] == "") {
        echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
        return;
}

$result = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $_POST['username'] . "'");

if (mysqli_num_rows($result) != 1) {
        $result = update("users", "username='" . $_POST['username'] . "' WHERE id='" . $_POST['id'] . "'");
        if ($result) {
                echo json_encode(array("status" => "success", "message" => "Berhasil Update Username"));
        } else {
                echo json_encode(array("status" => "error", "message" => "Gagal Update Username"));
        }
} else {
        echo json_encode(array("status" => "error", "message" => "Username Sudah Ada"));
}
