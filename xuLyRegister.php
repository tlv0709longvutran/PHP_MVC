<?php
$thongBao = '';
$linkTiepTuc = '';
require_once('Models/clsUser.php');
$user = new clsUser();
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$address = $_REQUEST["address"];
$telephone = $_REQUEST["telephone"];
$password = $_REQUEST["password"];
$rePassword = $_REQUEST["repassword"];
if ($password == $rePassword) {
    $result =  $user->register($name, $email, $password, $address, $telephone) ? 1 : -1;
} else {
    $result = 0;
}
if ($result == 1) {
    $thongBao = 'Register succesfully';
    $linkTiepTuc = 'login.php';
} else if ($result == -1) {
    $thongBao = 'email đã tồn tại';
    $linkTiepTuc = 'register.php';
} else {
    $linkTiepTuc = 'register.php';
    $thongBao = 'mật khẩu nhập lại không đúng';
}
require_once('./Views/viewUser/vResult.php');