<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="../css/mvc.css">
</head>
<body>
    <!-- Menu Section Start  -->
    <!-- Menu Section End  -->
    <!-- Main Content Section Start  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br />

            <br><br><br>
            <!-- Button to add admin -->
            <a href="?module=<?=$module?>&act=them" class="btn-primary">Add Admin</a>

            <br /><br /><br />
            <table class="tbl-full" >
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $rows = $admin->data;
                    foreach($rows as $row)
				    {
                    ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["name"]?></td>
                        <td><?=$row["email"]?></td>
                        <td>
                            
                            <a href="?module=<?=$module?>&act=xoa&id=<?=$row["id"]?>" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
            </table>

        </div>
    </div>
    <!-- Main Content Section End  -->


</body>
</html>