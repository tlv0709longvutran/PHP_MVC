<?php
$data = [];
$thongBao = '';
$linkTiepTuc = '?module=order';
require_once('Models/clsOrder.php');
$order = new clsOrder();
$result = $order->updateOrder($_REQUEST);
if ($result) {
    $thongBao = 'Update order succesfully';
} else
    $thongBao = 'Update order fail';


require_once('Views/viewUser/vResult.php');