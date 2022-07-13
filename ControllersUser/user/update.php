<?php

require_once('Models/clsUser.php');
$data = [];
$user = new clsUser();
$result = $user->show();
if ($result)
    $data = $user->data->fetch();
require_once('Views/viewUser/vUser.php');