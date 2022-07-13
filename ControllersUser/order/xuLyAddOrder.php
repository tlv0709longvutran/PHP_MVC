<?php
$thongBao = '';
$linkTiepTuc = '';

require_once('Models/clsOrder.php');
$order = new clsOrder();
$foodId = $_REQUEST["foodId"];
$result = $order->addOrder($foodId);
if ($result)
    $thongBao = 'add food succesfully';
else
    $thongBao = 'add food false';

require_once('Views/viewUser/vResult.php');