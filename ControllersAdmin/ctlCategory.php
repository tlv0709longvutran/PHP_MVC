<?php
require_once("Models/clsCategory.php");
$act = "";
$id = "";

$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];

$category = new clsCategory();

if($act == "them"){
	require("Views/vAdmin/vThemCategory.php");
}
else if($act == "sua"){
	$ketqua = $category->TimTheoIDCategory($id);
	require("Views/vAdmin/vSuaCategory.php");
}
else if($act == "xoa"){
	require("ControllersAdmin/categori/XulyXoaCategory.php");
}
else if($act == "xulythem"){
	require("ControllersAdmin/categori/xulythemCategory.php");
}	
else if($act == "xulysua"){
	require("ControllersAdmin/categori/xulySuaCategory.php");}
else{ 
	$ketqua = $category->ShowDSCategory(1);
	require("Views/vAdmin/vCategory.php");
}	
?>
