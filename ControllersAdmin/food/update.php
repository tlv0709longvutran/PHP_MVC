<?php
require_once("DungChung/Upload-Image.php");
$id = $_REQUEST["id"];
$category = $_REQUEST["category"];
$name = $_REQUEST["name"];
$descript = $_REQUEST["descript"];
$price = $_REQUEST["price"];
$image_name = UploadFile("image_name","Uploads/image");
if($image_name=="")
	$image_name = $_REQUEST["anhHientai"];
$active =1;
if(isset($_REQUEST["active"]))
{
	$active = $_REQUEST["active"];
}

$sale = $_REQUEST['sale'];
$ketqua = $food->UpdateFood($id,$name,$descript,$price,$image_name,$active,$category,$sale);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Sua dữ liệu thành công";
require("Views/vAdmin/vKetqua.php");
?>