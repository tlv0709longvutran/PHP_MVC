<?php
require_once('Models/clsCategory.php');
$cate = new clsCategory();
$id  = $_REQUEST["id"];
$link_tieptuc = '?module=category';



$checkFood = $cate->checkCate($id);
if ($checkFood) {
    $ketqua = $cate->XoaCategory($id);
    if ($ketqua == FALSE)
        $noidung_thongbao = "Lỗi xóa categori";
    else
        $noidung_thongbao = "Xóa thành công";
} else
    $noidung_thongbao = "Categori đã được sử dụng";


include("Views/vAdmin/vThongbao.php");