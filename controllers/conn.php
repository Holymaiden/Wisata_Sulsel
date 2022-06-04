<?php
$connect = mysqli_connect("localhost", "root", "", "db_destination");

function single($query)
{
        global $connect;
        $data = mysqli_query($connect, $query);
        return mysqli_fetch_assoc($data);
}

function many($table)
{
        global $connect;
        $hasil = mysqli_query($connect, "$table");
        $rows = [];
        while ($row = mysqli_fetch_assoc($hasil)) {
                $rows[] = $row;
        }
        return $rows;
}

function tambah($table, $value)
{
        global $connect;
        $query = "INSERT INTO $table values $value";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
}

function hapus($table, $id)
{
        global $connect;
        mysqli_query($connect, "DELETE FROM $table WHERE id=$id");
        return mysqli_affected_rows($connect);
}

function update($table, $query)
{
        global $connect;
        $result = mysqli_query($connect, "UPDATE $table SET $query");
        return mysqli_affected_rows($connect);
}

function findImage($image, $i)
{
        if (isset($image[$i])) {
                return "./images/" . ($image[$i]['image']);
        } else {
                return "assets/images/portfolio/sm/portfolio-02.jpg";
        }
}

function counts($table)
{
        global $connect;
        $hasil = mysqli_query($connect, "SELECT count(*) as jumlah FROM $table");
        return mysqli_fetch_assoc($hasil);
}

function slug($string)
{
        $string = trim($string);
        if (empty($string)) return '';
        $string = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $string);
        $string = strtolower(trim($string));
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/\-{2,}/', '-', $string);
        return $string;
}

function uploadImage($files)
{
        $target_dir = "D:/xampp/htdocs/Destination/images/";
        $random = uniqid() . "-";
        $target_file = $target_dir . $random . basename($files["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($files["tmp_name"]);
        if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
        } else {
                echo "File is not an image.";
                return [
                        "status" => "error",
                        "message" => "File is not an image."
                ];
        }

        // Check if file already exists
        if (file_exists($target_file)) {
                return [
                        "status" => "error",
                        "message" => "Sorry, file already exists."
                ];
        }

        // Check file size
        if ($files["size"] > 500000) {
                return [
                        "status" => "error",
                        "message" => "Sorry, your file is too large."
                ];
        }

        // Allow certain file formats
        if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
        ) {
                return [
                        "status" => "error",
                        "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
                ];
        }


        if (move_uploaded_file($files["tmp_name"], $target_file)) {
                return [
                        "status" => "success",
                        "message" => "The file " . htmlspecialchars(basename($files["name"])) . " has been uploaded.",
                        "data" => [
                                "name" => $random . basename($files["name"])
                        ]
                ];
        } else {
                return [
                        "status" => "error",
                        "message" => "Sorry, there was an error uploading your file."
                ];
        }
}
