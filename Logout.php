<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng xuất</title>
</head>

<body>
<?php
session_start();
session_destroy();//hủy toàn bộ các biến session
$thongbao = "ĐÃ ĐĂNG XUẤT THÀNH CÔNG";
$link_tieptuc = "login.php";
require("Views/vAdmin/vKetqua.php");
?>
</body>
</html>