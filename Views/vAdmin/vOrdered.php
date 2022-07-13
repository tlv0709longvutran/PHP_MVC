<!-- Main Content Section Start  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card {
    display: flex;
    margin: 50px 0;
    height: auto;
    width: 100%;
    background-color: #fff;
    position: relative;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    font-family: 'Lato', sans-serif;
}

.card .total {
    display: flex;
    justify-content: space-between;
}

.card .total h2 {
    color: #003dff;
}

.wrapper .view-order {
    width: 100%;
    margin: 0;
    padding: 0 40px;
}
</style>
<div class="main-content">
    <div class="wrapper view-order">
        <h1 class="text-center">Manage Order</h1>
        <br />

        <br>
        <!-- Button to add admin -->
        <br /><br /><br />
        <form action="?module=ordered&act=update" method="post">
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
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
                foreach ($rows as $row) {

                    $auth = "";
                    if ($row["auth"] == 1)
                        $auth = "Đã giao hàng";
                    else
                        $auth = "Chưa Giao";

                ?>
                <tr>
                    <td><?= $row["orderedID"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["orderedAddress"] ?></td>
                    <td><?= $row["orderedPhone"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td>$<?= $row["price"] ?></td>
                    <td>
                        <input type="radio" name="<?= $row['orderedID'] ?>" <?= $row['auth'] == 0 ? 'checked' : '' ?>
                            value="0">
                        Chưa giao
                        <input type="radio" name="<?= $row['orderedID'] ?>" <?= $row['auth'] == 1 ? 'checked' : '' ?>
                            value="1">
                        Đã giao
                    </td>
                    <td>
                        <a href="?module=ordered&act=chitiet&id=<?= $row["orderedID"] ?>" class="btn-secondary">Order
                            Details</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            <button type="submit" class="btn btn-primary">Save change</button>

            <div class="card">
                <div class="card-body total">
                    <h1>Tổng doanh thu</h1>
                    <h2>$<?= $total ?></h2>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- Main Content Section End  -->

<script>
function addToCart(id) {

    $.ajax({
        type: "GET",
        cache: false,
        url: "?module=order&art=addOrder",
        data: {
            foodId: id
        },
        success: function(result) {

            $('#test').html(result);
        }
    })
}
</script>