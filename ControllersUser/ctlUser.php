<?php
$art = '';
if (isset($_REQUEST["art"]))
    $art = $_REQUEST["art"];
switch ($art) {
    case 'xulyupdate':
        require_once('user/xuLyUpdate.php');
        break;

    default:
        require_once('user/update.php');
        break;
}