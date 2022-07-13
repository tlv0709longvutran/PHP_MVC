<?php
require_once("Models/clsAdmin.php");
$act = "";
$id = "";

$link_tieptuc ="?module=" . $module;
$thongbao ="";

if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];

$admin = new clsAdmin();

if($act == "them"){
	require("Views/vAdmin/vThemAdmin.php");
}
else if($act == "xoa"){
	require("ControllersAdmin/admin/XulyXoaadmin.php");
}
else if($act == "xulythem"){
	require("ControllersAdmin/admin/XulyThemadmin.php");
}	
else{ 
	$ketqua = $admin->LayDSAdmin(1);
	require("Views/vAdmin/vAdmin.php");
}	
?>