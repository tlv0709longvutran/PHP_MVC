<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <form action="?module=<?= $module ?>&act=xulythem" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name Food</td>
                    <td>
                        <input type="text" name="name" placeholder="Title of the food">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="descript" id="" cols="30" rows="5"
                            placeholder="Description of the Food."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="1" checked> Yes
                        <input type="radio" name="active" value="0"> No
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" id="">
                            <option value="0">Chon Nhom Sp</option>
                            <?php
                            require_once("Models/clsCategory.php");
                            require_once("DungChung/Upload-Image.php");
                            $nps = new clsCategory();
                            $nps->ShowDSCategory(); //lấy tất cả nhóm SP
                            ShowOptions($nps->data, "id", "name", 0);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sale: </td>
                    <td>
                        <input type="number" name="sale">%
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>