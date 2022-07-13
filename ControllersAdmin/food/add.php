<?php
require_once("DungChung/Upload-Image.php");
if(isset($_REQUEST["submit"])==false)
{
    $noidung_thongbao = "Chưa nhập thông tin";
}
else
{
	$name = $_REQUEST["name"];
	$descript = $_REQUEST["descript"];
	$price = $_REQUEST["price"];

	$image_name = UploadFile("image_name", "Uploads/image");
	$category = $_REQUEST["category"];
	$active = 1;
	if (isset($_REQUEST["active"]))
	{
		$active = $_REQUEST["active"];
	}
		
	$sale = $_REQUEST["sale"];

	$ketqua = $food->AddFood($name, $descript, $price, $image_name, $active, $category, $sale);
	if ($ketqua == FALSE)
		$thongbao = "Lỗi thêm dữ liệu";
	else
		$thongbao = "Thêm dữ liệu thành công";
	require("Views/vAdmin/vThongbao.php");
}
?>