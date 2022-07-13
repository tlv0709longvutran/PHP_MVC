<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <form action="?module=<?=$module?>&act=xulythem" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name Category</td>
                    <td>
                        <input type="text" name="name" placeholder="Title of the Category">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="descript" id="" cols="30" rows="5" placeholder="Description of the Category."></textarea>
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
                        <input type="radio" name="active" value="Yes" checked> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>