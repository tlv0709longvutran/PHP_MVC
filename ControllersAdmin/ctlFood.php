<?php
//đây là controller chỉnh của module quản lý sản phẩm
require_once("Models/clsFood.php");

$link_tieptuc ="?module=" . $module;
$thongbao ="";

$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$tieude_thongbao= "Quản lý sản phẩm";
$noidung_thongbao = "";
$link_thongbao ="ControllersAdmin/ctlCategory.php";


$food = new clsFood();

if($act=="them") //hiển thị form thêm sản phẩm
{
    require("Views/vAdmin/vThemFood.php");
}
else if($act=="xulythem")
{
    require("ControllersAdmin/food/add.php");
}
else if($act=="sua")
{
    $ketqua = $food->TimTheoIDFood($id);
    require("Views/vAdmin/vSuaFood.php");
}
else if($act=="xulysua")
{
    require("ControllersAdmin/food/update.php");
}
else if($act=="xoa")
{
    require("ControllersAdmin/food/delete.php");
}
else
{
    $ketqua = $food->getListFood();
    require("Views/vAdmin/vFood.php");
}
?>