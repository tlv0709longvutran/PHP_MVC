<?php
$art = '';
if (isset($_REQUEST["art"]))
    $art = $_REQUEST["art"];
switch ($art) {
    case 'addOrder':
        require_once('order/xuLyAddOrder.php');
        break;
    case 'checkout':
        require_once('order/checkout.php');
        break;
    case 'xulycheckout':
        require_once('order/xuLycheckout.php');
        break;
    case 'showOrdered':
        require_once('order/xuLyShowOrdered.php');
        break;
    case 'delfood':
        require_once('order/xuLyDelFood.php');
        break;
    case 'chitiet':
        require_once('order/xuLyShowOrderedDetail.php');
        break;
    case 'update':
        require_once('order/xuLyUpdate.php');
        break;

    default:
        require_once('order/xuLyShowOrder.php');
        break;
}