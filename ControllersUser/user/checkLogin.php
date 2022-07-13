<?php

if (isset($_SESSION["id"]))
    echo '';
else {
    $thongBao = 'ban chua dang nhap';
    $linkTiepTuc = 'loginUser.php';
    require_once('Views/viewUser/vResult.php');
    die();
}