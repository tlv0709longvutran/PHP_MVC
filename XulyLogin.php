<?php
session_start();
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$password = md5($password);

$sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";

require_once('Models/clsDatabase.php');
$db = new clsDatabase();
$result = $db->ThucThiSQL($sql);
$n = $db->pdo_stm->rowCount();
if ($n > 0) {

	$row = $db->pdo_stm->fetch(PDO::FETCH_BOTH);
	$_SESSION["logined"] = "OK";
	$_SESSION["email"] = $row["email"];
	$_SESSION["nameAdmin"] = $row["name"];
	$thongbao = "ĐĂNG NHẬP THÀNH CÔNG";
	$link_tieptuc = "index-admin.php";
	require("Views/vAdmin/vKetqua.php");
} else {
	$_SESSION["logined"] = "";
	$thongbao = "ĐĂNG NHẬP THẤT Bại";
	$link_tieptuc = "Login.php";
	require("Views/vAdmin/vKetqua.php");
}