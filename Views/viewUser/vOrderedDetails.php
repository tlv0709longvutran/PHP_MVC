<div class="main-content">
    <div class="wrapper">
        <h1 style="color:blue;">Ordered Detail</h1>
        <br />

        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Tên KH</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ngày Order</th>
                <th>Trạng thái</th>
                <th>Total</th>
            </tr>
            <?php
      $data = $ordered->data;
      $rows[] = $data->fetch();


      $sn = 0;

      $sn++;
      ?>
            <tr>
                <td> <?= $sn ?> </td>
                <td> <?= $rows[0]["userName"] ?> </td>
                <td> <?= $rows[0]["address"] ?> </td>
                <td> <?= $rows[0]["telephone"] ?> </td>
                <td> <?= $rows[0]["date"] ?></td>
                <td> <?= $rows[0]["auth"] === 1 ? 'Đã giao hàng' : 'Chưa giao hàng' ?> </td>
                <td> <?= $rows[0]["total"] ?> </td>
            </tr>
        </table>
        <br>
        <h1 style="color:red;">Sản Phẩm Ordered</h1>
        <table class="tbl-full">
            <tr>
                <td>STT</td>
                <td>Name</td>
                <td>Descript</td>
                <td>Image</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
            </tr>
            <?php
      foreach ($data as $row) {
        $rows[] = $row;
      }
      $sn = 0;
      foreach ($rows as $row) {

        $image_name = $row["image_name"];
        if ($image_name == "")
          $image_name = "no-Image.png";
        $sn++;
      ?>
            <tr>
                <td><?= $sn ?></td>

                <td>
                    <a href="?module=food&id=<?= $row['foodId'] ?>"><?= $row["name"] ?></a>
                </td>
                <td><?= $row["descript"] ?></td>
                <td>
                    <a href="?module=food&id=<?= $row['foodId'] ?>">
                        <img width="100" src="Uploads/image/<?= $image_name ?>"><br>
                    </a>
                    <input type="hidden" name="anhHientai" id="anhHientai" value="<?= $row["image_name"] ?>">
                </td>

                <td><?= $row["piece"] ?></td>
                <td><?= number_format($row["piece"] * $row["price"]) ?></td>
            </tr>
            <?php
      }
      ?>
        </table>

    </div>
</div>
<!-- Main Content Section End  -->