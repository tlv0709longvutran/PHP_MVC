<?php
require_once("DungChung/Upload-Image.php");
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$descript = $_REQUEST["descript"];
$image_name = UploadFile("image_name","Uploads/image");
if($image_name=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
	$image_name = $_REQUEST["anhHientai"];
$active =1;
if(isset($_REQUEST["active"]))
{
	$active = $_REQUEST["active"];
}
	
$ketqua = $category->UpdateCategory($id,$name,$descript,$image_name,$active);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Sua dữ liệu thành công";
require("Views/vAdmin/vKetqua.php");
?>