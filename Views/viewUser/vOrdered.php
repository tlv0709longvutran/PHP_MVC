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
            <h1>Manage Order</h1>
            <br />

            <br><br><br>
            <!-- Button to add admin -->
            <br /><br /><br />
            <table class="tbl-full">
                <tr>
                    <th>STT</th>
                    <th>Ten KH</th>
                    <th>Address</th>
                    <th>Number Phone</th>
                    <th>Date Order</th>
                    <th>Total Money</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                <?php
                $rows = $ordered->data;
                $stt = 0;
                foreach ($rows as $row) {

                    $auth = "";
                    if ($row["auth"] == 1)
                        $auth = "Đã giao hàng";
                    else
                        $auth = "Chưa Giao";

                ?>
                <tr>
                    <td><?= ++$stt ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["orderedAddress"] ?></td>
                    <td><?= $row["orderedPhone"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td>$<?= $row["price"] ?></td>
                    <td><?= $auth ?></td>
                    <td>
                        <a href="?module=order&art=chitiet&id=<?= $row["orderedID"] ?>" class="btn-secondary">Order
                            Details</a>
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