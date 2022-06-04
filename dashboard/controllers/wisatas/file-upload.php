<?php
require_once("../../../controllers/conn.php");

$image1 = "";
$image2 = "";
$image3 = "";

$wisata = many("SELECT id FROM `images` WHERE destination_id='" . $_GET['id'] . "'");

if (isset($_FILES['file1'])) {
        $image1 = uploadImage($_FILES['file1']);

        if ($image1['status'] == "error") {
                echo json_encode(array("status" => "success", "message" => $image1['message']));
                return;
        }
        if (isset($wisata[0]['id']))
                $result =  update("images", "image = '" . $image1['data']['name'] . "' WHERE id =" . $wisata[0]['id'] . "");
        else
                $result =  tambah("images", "('','" . $image1['data']['name'] . "', " . $_GET['id'] . ")");
}
if (isset($_FILES['file2'])) {
        $image2 = uploadImage($_FILES['file2']);
        if ($image2['status'] == "error") {
                echo json_encode(array("status" => "success", "message" => $image2['message']));
                return;
        }
        if (isset($wisata[1]['id']))
                $result = update("images", "image = '" . $image2['data']['name'] . "' WHERE id =" . $wisata[1]['id'] . "");
        else
                $result = tambah("images", "('','" . $image2['data']['name'] . "'," . $_GET['id'] . ")");
}

if (isset($_FILES['file3'])) {
        $image3 = uploadImage($_FILES['file3']);
        if ($image3['status'] == "error") {
                echo json_encode(array("status" => "success", "message" => $image2['message']));
                return;
        }
        if (isset($wisata[2]['id']))
                $result = update("images", "image = '" . $image3['data']['name'] . "' WHERE id =" . $wisata[2]['id'] . "");
        else
                $result = tambah("images", "('','" . $image3['data']['name'] . "'," . $_GET['id'] . ")");
}

if ($result) {
        echo json_encode(array("status" => "success", "message" => "Berhasil Update Image Wisata"));
} else {
        echo json_encode(array("status" => "error", "message" => "Gagal Update Image Wisata"));
}
