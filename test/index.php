<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('header.php');
    echo '<input name="test" type="text">';
    if (isset($_REQUEST['module']))
        switch ($_REQUEST['module']) {
            case 'test2':
                require_once('test2.php');
                break;
            case 'test3':
                require_once('test3.php');
                break;

            default:
                require_once('test.php');
                break;
        }
    else
        require_once('test.php');

    ?>


</body>

</html>