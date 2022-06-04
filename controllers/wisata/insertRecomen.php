<?php
require_once '../conn.php';
$me = "";
if ($_POST['option'] == "Rekomendasikan") {
        $result = tambah("recommendations", "('','" . $_POST['user'] . "','" . $_POST['id'] . "')");
        $me = "Hapus Rekomendasi";
} else {
        $result = mysqli_query($connect, "DELETE FROM recommendations WHERE `user_id`='" . $_POST['user'] . "' AND `destination_id`='" . $_POST['id'] . "'");
        $me = "Rekomendasikan";
}

if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Rekomendasi", 'data' => $me));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Rekomendasi"));
}
