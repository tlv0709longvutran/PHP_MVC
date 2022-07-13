<?php
require_once('Models/clsUser.php');
$linkTiepTuc = 'index.php';
$thongBao = '';
$data = [];
$user = new clsUser();
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$address = $_REQUEST["address"];
$telephone = $_REQUEST["telephone"];
$result = $user->update($name, $email, $password, $address, $telephone);
if ($result) { {
        $thongBao = 'update user succesfully';
        $_SESSION["name"] = $name;
    }
} else
    $thongBao = 'update user fail';

require_once('Views/viewUser/vResult.php');