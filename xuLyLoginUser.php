<?php
$thongBao = '';
session_start();
require_once('Models/clsUser.php');
$user = new clsUser();
$result = false;
if (isset($_REQUEST["email"]) && isset($_REQUEST["password"]))
    $result = $user->login($_REQUEST["email"], $_REQUEST["password"]);
if ($result) {
    $row = $user->data->fetch();
    $_SESSION["id"] = $row['id'];
    $_SESSION["name"] = $row['name'];
    header('location: index.php');
} else {
    $thongBao = 'sai thong tin tai khoan mat khau';
    $linkTiepTuc = 'loginUser.php';
    require_once('Views/viewUser/vResult.php');
}