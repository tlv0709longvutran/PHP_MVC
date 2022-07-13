<?php
// Kiểm tra nếu chưa có biến logined thì chưa cho đăng nhập
if(isset($_SESSION["logined"])==false || $_SESSION["logined"]=="")
{
	
	$thongbao = "BẠN CHƯA ĐĂNG NHẬP";
	$link_tieptuc = "Login.php";
	require("Views/vAdmin/vKetqua.php");
	
}
?>