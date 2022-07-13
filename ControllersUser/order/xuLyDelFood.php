<?php
$thongBao = '';
$linkTiepTuc = '';

require_once('Models/clsOrder.php');
$order = new clsOrder();
$foodId = $_REQUEST["foodId"];
$result = $order->delFoodOrder($foodId);
if ($result)
    $thongBao = 'Delete food from order succesfully';
else
    $thongBao = 'Delete food from order fail';

require_once('Views/viewUser/vResult.php');