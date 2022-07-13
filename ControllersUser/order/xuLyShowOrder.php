<?php
$data = [];
require_once('Models/clsOrder.php');
$order = new clsOrder();
$result = $order->showOrder();
if ($result)
    $data = $order->data;
require_once('Views/viewUser/vCart.php');