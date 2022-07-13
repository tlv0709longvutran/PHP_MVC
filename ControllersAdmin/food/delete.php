<?php
require_once('Models/clsFood.php');
$food = new clsFood();
$id  = $_REQUEST["id"];
$link_tieptuc = '?module=food';



$checkFood = $food->checkFood($id);
if ($checkFood) {
    $ketqua = $food->DeleteFood($id);
    if ($ketqua == FALSE)
        $noidung_thongbao = "Lỗi xóa sản phẩm";
    else
        $noidung_thongbao = "Xóa thành công";
} else {
    $ketqua = $food->offFood($id);
    if ($ketqua)
        $noidung_thongbao = "Sản phẩm trong order và được ẩn";
    else
        $noidung_thongbao = "Ẩn sản phẩm lỗi";
}

include("Views/vAdmin/vThongbao.php");