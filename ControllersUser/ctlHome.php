<?php
require_once('Models/clsFood.php');
$food = new clsFood();
$art = '';
$data = [];
if (isset($_REQUEST["art"]))
    $art = $_REQUEST["art"];
switch ($art) {
    case 'softByPrice':
        $food->showFoodByPrice();
        $data = $food->data;
        include_once('Views/viewUser/vHome.php');
        break;
    case 'softBySale':
        $food->showFoodBySale();
        $data = $food->data;
        include_once('Views/viewUser/vHome.php');
        break;
    case 'softByCate':
        $food->showFoodByCate();
        $data = $food->data;
        $cate = '';
        $result = [];
        foreach ($data as $row) {
            if ($row['cateName'] != $cate) {
                $cate = $row['cateName'];
                $result[$cate][] = $row;
            } else
                $result[$cate][] = $row;
        }
        include_once('Views/viewUser/vHomeSoftByCate.php');
        break;
    case 'search':
        $sName = $_REQUEST["sname"];
        $food->searchFood($sName);
        $data = $food->data;
        include_once('Views/viewUser/vHome.php');
        break;

    default:
        $food->showFood();
        $data = $food->data;
        include_once('Views/viewUser/vHome.php');
        break;
}