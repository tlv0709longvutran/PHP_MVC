<?php
$data = [];
$thongBao = '';
$linkTiepTuc = 'index.php';
require_once('Models/clsOrder.php');
$order = new clsOrder();
$address = $_REQUEST["address"];
$telephone = $_REQUEST["telephone"];
$totalOrder = $_REQUEST["totalorder"];

$result = $order->checkOut($address, $telephone, $totalOrder);
if ($result) {
    $data = $order->data;
    $thongBao = 'checkout succesfully';
} else
    $thongBao = 'checkout fail';
require_once('Views/viewUser/vResult.php');