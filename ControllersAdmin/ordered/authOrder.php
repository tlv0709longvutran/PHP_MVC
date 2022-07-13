<?php
require_once('Models/clsOrdered.php');
$ordered = new clsOrdered();
$thongbao = '';
$link_tieptuc = '?module=ordered';
$formData = $_REQUEST;
$result = $ordered->ChangeActiveOrder($formData);
if ($result)
    $thongbao = 'Update change active succesfully';
else
    $thongbao = 'Update change active succesfully';
require_once('Views/vAdmin/vKetqua.php');