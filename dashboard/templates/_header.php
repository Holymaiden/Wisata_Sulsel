<?php
session_start();
if (!isset($_SESSION['username'])) {
        print("<script>location.href = '../index.php';</script>");
} else {
        if (!isset($_SESSION['x-y']) || $_SESSION['x-y'] == "y")
                print("<script>location.href = '../index.php';</script>");
}
?>
<!doctype html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard - <?= $title ?></title>

        <?php require_once("../dashboard/templates/css/css.php") ?>

        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
        <!-- Preloader -->
        <div class="preloader">
                <div class="preloader-icon"></div>
                <span>Loading...</span>
        </div>
        <!-- ./ Preloader -->