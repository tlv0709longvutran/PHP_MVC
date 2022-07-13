<?php 
require_once("DungChung/Upload-Image.php");
if(isset($_REQUEST["submit"])==false)
{
    $noidung_thongbao = "Chưa nhập thông tin";
}
else
{
    //lấy thông tin từ form
    $full_name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = md5($_REQUEST['password']);
    $confirm_password=md5($_REQUEST['confirm-password']);
    if($password != $confirm_password)
    {
        $noidung_thongbao = "Mật khẩu không trùng khớp";
    }
    $ketqua = $admin->ThemTaiKhoan($full_name,$email,$password);
    if($ketqua==FALSE)
        $noidung_thongbao ="Lỗi thêm Amin";
    else   
        $noidung_thongbao ="Thêm thành công";
}
include("Views/vAdmin/vThongbao.php");
?>