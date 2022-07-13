<?php
require_once("Models/clsOrdered.php");
$act = "";
$id = "";

if (isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];

$ordered = new clsOrdered();
$ketqua = $ordered->Ordereddetail($id);
require("Views/viewUser/vOrderedDetails.php");