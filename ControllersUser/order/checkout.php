<?php
require_once('Models/clsUser.php');
$data = [];
$user = new clsUser();
require_once('Models/clsOrder.php');
$useriD = $_SESSION["id"];
$order = new clsOrder();
$result = $order->updateOrder($_REQUEST);
$total = $order->updateTotalOrder($useriD);

if ($result) {
    $result = $user->show();
    if ($result)
        $data = $user->data->fetch();
    require_once('Views/viewUser/vCheckout.php');
} else {
    $thongBao = 'checkout fail';
    $linkTiepTuc = 'index.php';
    require_once('Views/viewUser/vResult.php');
}