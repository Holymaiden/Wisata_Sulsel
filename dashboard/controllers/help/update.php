<?php
require_once("../../../controllers/conn.php");

if ($_POST['content'] != "") {
        $_POST['content'] = str_replace("                                                        ", "", $_POST['content']);

        $_POST['content'] = str_replace(array("\n", "\r"), ' ', $_POST['content']);
}

$result = tambah("contents", "('','" . $_GET['option'] . "','" . $_POST['content'] . "') ON DUPLICATE KEY UPDATE content='" . $_POST['content'] . "', setting='" . $_GET['option'] . "'");

if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Update ", $_GET['option'], "content" => $_POST['content']));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Update ", $_GET['option']));
}
