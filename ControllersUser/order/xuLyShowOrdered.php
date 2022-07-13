<?php
$data = [];
require_once('Models/clsOrdered.php');
$ordered = new clsOrdered();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $ordered->Ordereddetail($id);
    $data = $ordered->data;
    require_once('Views/viewUser/vOrderedDetails.php');
} else {
    $ordered->ShowDsOrderUser();
    $data = $ordered->data;
    require_once('Views/viewUser/vOrdered.php');
}