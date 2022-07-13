<?php
require_once('Models/clsFood.php');
$food = new clsFood();
$foodId = $_REQUEST["id"];
$result = $food->showFoodById($foodId);
$cateID = '';
$foodData = [];
$foodRelatedData = [];
if ($result) {
    $foodData = $food->data->fetch();
    $cateID = $foodData['cateId'];
} else {
    $thongBao = 'show food detail fail';
    require_once('Views/viewUser/vResult.php');
}

$result = $food->showFoodRelated($foodId, $cateID);
if ($result)
    $foodRelatedData = $food->data;
else {
    $thongBao = 'show food related fail';
    require_once('Views/viewUser/vResult.php');
}

require_once('Views/viewUser/vFoodDetail.php');