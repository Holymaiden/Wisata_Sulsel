<?php
require_once '../conn.php';

$result = mysqli_query($connect, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");

if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(array("status" => "success", "message" => "User Ditemukan", "data" => $row));
} else {
        echo json_encode(array("status" => "error", "message" => "Error User Tidak Ditemukan"));
}
