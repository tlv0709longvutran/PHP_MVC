<?php

use LDAP\Result;

require_once("Models/clsOrdered.php");
$act = "";
$id = "";
$link_tieptuc = "?module=" . $module;
$thongbao = "";

if (isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if (isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];

$ordered = new clsOrdered();


if ($act == "update") {
	require("ordered/authOrder.php");
} else if ($act == "chitiet") {
	$ketqua = $ordered->TimOrder($id);
	if ($ketqua == TRUE) {
		$rowHD = $ordered->data;

		if ($rowHD) {
			$ketqua = $ordered->Ordereddetail($id);
			require("Views/vAdmin/vOrderedDetails.php");
		} else {
			$thongbao = "HÓA ĐƠN KHÔNG TỒN TẠI";
			require("Views/vAdmin/vKetqua.php");
		}
	} else {
		$thongbao = "LỖI TRUY VẤN HÓA ĐƠN";
		require("Views/vAdmin/vKetqua.php");
	}
} else {

	$result = $ordered->totalOrdered();
	$total = $ordered->data['total'];
	$ketqua = $ordered->ShowDsOrder();
	if ($result && $ketqua)
		require("Views/vAdmin/vOrdered.php");
	else {
		$thongbao = "LỖI TRUY VẤN HÓA ĐƠN";
		require("Views/vAdmin/vKetqua.php");
	}
}