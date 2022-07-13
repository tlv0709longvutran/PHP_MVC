<?php
session_start();
require_once('./ControllersUser/user/checkLogin.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('./Views/viewChung/header.php');

    $module = "";
    if (isset($_REQUEST["module"]))
        $module = $_REQUEST["module"];
    switch ($module) {

        case 'user':
            require_once('ControllersUser/ctlUser.php');
            break;
        case 'order':
            require_once('ControllersUser/ctlOrder.php');
            break;
           
        case 'test':
            require_once('test/index.php');
            break;
        case 'food':
            require_once('ControllersUser/ctlFoodDetail.php');
            break;

        default:
            include_once('ControllersUser/ctlHome.php');
            break;
    }
    require_once('Views/viewChung/footer.php');
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>