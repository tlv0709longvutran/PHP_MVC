<?php
require_once('Models/clsDatabase.php');
$db = new clsDatabase();
// $sql = "INSERT INTO `ordered` (`id`, `userId`, `address`, `telephone`, `date`, `price`, `auth`)
//          VALUES (null,?, ?, ?, current_timestamp(),?, '0');";
$sql  = "INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `telephone`) VALUES (NULL, 'girl xinh', 'girlxinh@gmail.com', '123456', 'hair phongf', '0587234423');";

$db->conn->exec($sql);

print_r($db->conn->lastInsertId());
// $orderedId = $db->pdo_stm->fetch()['LAST_INSERT_ID()'];
// echo $orderedId;