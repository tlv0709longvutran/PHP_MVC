<?php
if ($food->data == NULL) {
	$thongbao = "không tìm thấy thông tin";
	require("Views/vAdmin/vKetqua.php");
} else {
?>
<div id="content_right">
    <h2> Update Food</h2>
    <div id="right_detail">
        <?php

			if ($id == "") {
				$noidung_thongbao = "Chưa có id sửa";
				require_once('vThongbao.php');
				die();
			}
			if (is_numeric($id) == false) {
				$noidung_thongbao = "id phải là số";
				require_once('vThongbao.php');
				die();
			}
			if ($ketqua == FALSE) {
				$noidung_thongbao = "LỖI TRUY VẤN CSDL";
				require_once('vThongbao.php');
				die();
			}
			if ($food->data == NULL) {
				$noidung_thongbao = "không tìm thấy sản phẩm có id=$id";
				require_once('vThongbao.php');
				die();
			}
			$row = $food->data;
			?>
        <form name="form1" method="post" action="?module=<?= $module ?>&act=xulysua" enctype="multipart/form-data">

            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="120" height="30">Nhóm sản phẩm:</td>
                    <td width="630">
                        <select name="category" id="s1">
                            <option value="0"> Chọn nhóm SP</option>
                            <?php
								require_once("Models/clsCategory.php");
								require_once("DungChung/Upload-Image.php");
								$nps = new clsCategory();
								$nps->ShowDSCategory(); ////lấy tất cả nhóm SP
								ShowOptions($nps->data, "id", "name", $row["cateId"]);
								?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="142" height="30">Name:</td>
                    <td width="258"><input type="text" name="name" id="t1" value="<?= $row["name"]; ?>"></td>
                </tr>
                <tr>
                    <td height="30">Descript:</td>
                    <td><input type="text" name="descript" id="t2" value="<?= $row["descript"] ?>"></td>
                </tr>
                <tr>
                    <td height="30">Price:</td>
                    <td><input type="text" name="price" id="t3" value="<?= $row["price"] ?>"></td>
                </tr>
                <tr>
                    <td height="30">Hình ảnh:</td>
                    <?php
						$image_name = $row["image_name"];
						if ($image_name == "")
							$image_name = "no-Image.png";
						?>
                    <td>
                        <img width="100" src="Uploads/image/<?= $image_name ?>"><br>
                        <input type="hidden" name="anhHientai" id="anhHientai" value="<?= $row["image_name"] ?>">
                        <input type="file" name="image_name" id="f1">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="1" <?= ($row["active"] == 1) ? "checked" : "" ?>>Yes
                        <input type="radio" name="active" value="0" <?= ($row["active"] == 0) ? "checked" : "" ?>>No
                    </td>
                </tr>
                <tr>
                    <td>Sale: </td>
                    <td>
                        <input type="number" name="sale" value="<?= $row["sale"] ?>">
                    </td>
                </tr>
                <tr>

                    <td><input type="submit" name="submit" id="" value="Update Food" class="btn-secondary"></td>
                    <td><input type="hidden" name="id" id="id" value="<?= $id ?>"></td>
                </tr>
            </table>
        </form>
        <script language="javascript">
        var ckTomtat = CKEDITOR.replace('t4');
        ckTomtat.config.width = 600;
        CKFinder.setupCKEditor(ckTomtat, null, {
            type: 'Images'
        });

        var ckNoidung = CKEDITOR.replace('t5');
        ckNoidung.config.width = 600;
        CKFinder.setupCKEditor(ckNoidung, null, {
            type: 'Images'
        });
        </script>
    </div>
</div>
<?php
}
?>