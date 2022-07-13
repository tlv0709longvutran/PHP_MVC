<?php 
require_once("DungChung/Upload-Image.php");
if(isset($_REQUEST["submit"])==false)
{
    $noidung_thongbao = "Chưa nhập thông tin";
}
else
{
    //lấy thông tin từ form
    $name = $_REQUEST["name"];
    $descript = $_REQUEST["descript"];
    $image_name = UploadFile("image_name" , "Uploads/image");   
    if(isset($_REQUEST['active']))
    {
        $active = $_REQUEST['active'];
    }
    $ketqua = $category->ThemCategory($name,$descript,$image_name,$active);
    if($ketqua==FALSE)
        $noidung_thongbao ="Lỗi thêm sản phẩm";
    else   
        $noidung_thongbao ="Thêm thành công";
}
include("Views/vAdmin/vThongbao.php");
?>