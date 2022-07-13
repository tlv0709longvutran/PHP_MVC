</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <!-- Main Content Section Start  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br />

            <br><br><br>
            <a href="?module=<?= $module ?>&act=them" class="btn-primary">Add Food</a>
            <!-- Button to add admin -->
            <br /><br /><br />

            <?php
            if ($ketqua) {
            ?>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Sale</th>
                    <th>Action</th>
                </tr>
                <?php
                    $rows = $food->data;
                    foreach ($rows as $row) {
                        $image_name = $row["image_name"];
                        if ($image_name == "")
                            $image_name = "no-Image.png";
                        $active = "";
                        if ($row["active"] == 1)
                            $active = "Yes";
                        else
                            $active = "No";
                    ?>
                <tr>
                    <td> <?= $row["id"] ?> </td>
                    <td> <?= $row["name"] ?> </td>
                    <td> <?= $row["descript"] ?> </td>
                    <td> <?= $row["price"] ?> </td>
                    <td align="center"> <img width="80" src="Uploads/image/<?= $image_name ?>"> </td>
                    <td> <?= $active ?> </td>
                    <td><?= $row["sale"] ?>%</td>
                    <td>
                        <a href="?module=<?= $module ?>&act=sua&id=<?= $row["id"] ?>" class="btn-secondary">Update
                            Food</a>
                        <a href="?module=<?= $module ?>&act=xoa&id=<?= $row["id"] ?>" class="btn-danger">Delete Food</a>
                    </td>
                </tr>
                <?php
                    } //đóng foreach
                    ?>
            </table>
            <?php
            } ?>

        </div>
    </div>
    <!-- Main Content Section End  -->


</body>

</html>