<?php
    session_start();
    require_once("KiemTraDangNhap.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<!-- Menu Section Start  -->
<div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index-admin.php">Home</a></li>
                <li><a href="?module=admin">Admin</a></li>
                <li><a href="?module=category">Category</a></li>
                <li><a href="?module=food">Foods</a></li>
                <li><a href="?module=ordered">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul> 
        </div>
    </div>
    <!-- Menu Section End  -->
	<div class="main-content">
        <div class="wrapper">            
            <div class="clear-fix">
                <?php
                    $module = "";
                    if(isset($_REQUEST["module"]))
                        $module = $_REQUEST["module"];
                    if($module=="admin")
                    {
                        require("ControllersAdmin/ctlAdmin.php");
                    }
                    else if($module=="category")
                    {
                        require("ControllersAdmin/ctlCategory.php");
                    }
                    else if($module=="food")
                    {
                        require("ControllersAdmin/ctlFood.php");
                    }
                    else if($module=="ordered")
                    {
                        require("ControllersAdmin/ctlOrdered.php");
                    }
                    else
                    {
                        require("Views/vAdmin/vHome.php");
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer Section Start  -->
    <div class="footer">
       <div class="wrapper">
            <p class="text-center">2022 ALL rights reserved - Design By <a href="https://www.facebook.com/Eviljayce0709/">Tran Long Vu </a> - T2104E <a href="https://aptech.fpt.edu.vn/">FPT Aptech</a></p>
       </div>
    </div>
    <!-- Footer Section End  -->


</body>
</html>