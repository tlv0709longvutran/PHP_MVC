<!-- Menu Section Start  -->
<div class="menu text-center">
    <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?module=order">Order</a></li>
            <li><a href="?module=order&art=showOrdered">Ordered</a></li>
            <li><a href="?module=user"><?= $_SESSION["name"] ?></a></li>
            <li><a href="xuLyLogout.php">Log Out</a></li>
        </ul>
    </div>
</div>
<!-- Menu Section End  -->